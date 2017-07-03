<?php

namespace WTG\Theme;

/**
 * Theme metadata.
 *
 * @package     WTG\Theme
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class Metadata
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $author;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $version;

    /**
     * @var string
     */
    public $license;

    /**
     * @var string
     */
    public $path;

    /**
     * Metadata constructor.
     *
     * @param  array  $metadata
     * @param  string  $path
     */
    public function __construct(array $metadata, string $path)
    {
        $this->name = $metadata['name'];
        $this->author = $metadata['author'];
        $this->description = $metadata['description'];
        $this->version = $metadata['version'];
        $this->license = $metadata['license'];
        $this->path = $path;
    }
}