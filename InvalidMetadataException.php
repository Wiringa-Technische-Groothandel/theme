<?php

namespace WTG\Theme;
use Throwable;

/**
 * Class InvalidMetadataException
 *
 * @package     WTG\Theme
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class InvalidMetadataException extends ThemeException
{
    /**
     * InvalidMetadataException constructor.
     *
     * @param  string  $metadataPath
     * @param  int  $code
     * @param  Throwable|null  $previous
     */
    public function __construct($metadataPath, $code = 0, Throwable $previous = null)
    {
        $message = "Invalid theme metadata at '$metadataPath'";

        parent::__construct($message, $code, $previous);
    }
}