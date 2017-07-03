<?php

namespace WTG\Theme\Contracts;

use Illuminate\Support\Collection;
use Illuminate\Filesystem\Filesystem;

/**
 * Theme scanner contract.
 *
 * @package     WTG\Theme
 * @subpackage  Contracts
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
interface ThemeScanner
{
    /**
     * ThemeScanner constructor.
     *
     * @param  Filesystem  $fs
     */
    public function __construct(Filesystem $fs);

    /**
     * Set the base directory to scan through.
     *
     * @param  string|array  $directories
     * @return $this
     */
    public function directories(array $directories);

    /**
     * Scan the directories for themes
     *
     * @return Collection
     */
    public function scan(): Collection;

    /**
     * Parse a theme metadata json file.
     *
     * @param  string  $path
     * @return array
     * @throws InvalidMetadataException
     */
    public function parseMetadata(string $path): array;

    /**
     * Normalize the metadata into something useful.
     *
     * @param  array  $meta
     * @return array
     */
    public function normalizeMetadata(array $meta): array;
}