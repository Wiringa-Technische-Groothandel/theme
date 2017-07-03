<?php

namespace WTG\Theme;

use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;
use WTG\Theme\Contracts\ThemeScanner as ScannerContract;

/**
 * Theme scanner.
 *
 * @package     WTG\Theme
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class ThemeScanner implements ScannerContract
{
    /**
     * @var Filesystem
     */
    protected $fs;

    /**
     * @var array
     */
    public $directories;

    /**
     * ThemeScanner constructor.
     *
     * @param  Filesystem  $fs
     */
    public function __construct(Filesystem $fs)
    {
        $this->directories =  config('theme.paths');
        $this->fs = $fs;
    }

    /**
     * Set the base directory to scan through.
     *
     * @param  string|array  $directories
     * @return $this
     */
    public function directories(array $directories)
    {
        $this->directories = $directories;

        return $this;
    }

    /**
     * Scan the directories for themes
     *
     * @return Collection
     */
    public function scan(): Collection
    {
        $themes = [];

        foreach ($this->directories as $path) {
            $directories = $this->fs->directories($path);

            foreach ($directories as $directory) {
                $metaPath = realpath($directory.'/metadata.json');

                if (!$this->fs->exists($metaPath)) {
                    continue;
                }

                $metadata = $this->normalizeMetadata(
                    $this->parseMetadata($metaPath)
                );

                $themes[] = new Metadata($metadata, $directory);
            }
        }

        return collect($themes);
    }

    /**
     * Parse a theme metadata json file.
     *
     * @param  string  $path
     * @return array
     * @throws InvalidMetadataException
     */
    public function parseMetadata(string $path): array
    {
        $meta = json_decode($this->fs->get($path), true);

        if (!$meta) {
            throw new InvalidMetadataException($path);
        }

        return $meta;
    }

    /**
     * Normalize the metadata into something useful.
     *
     * @param  array  $meta
     * @return array
     */
    public function normalizeMetadata(array $meta): array
    {
        return [
            'name'          => $meta['name'],
            'author'        => $meta['author'],
            'description'   => $meta['description'],
            'version'       => $meta['version'],
            'license'       => ($meta['license'] ?? '')
        ];
    }
}