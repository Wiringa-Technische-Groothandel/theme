<?php

namespace WTG\Theme;

/**
 * Theme not found exception.
 *
 * @package     WTG\Theme
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class ThemeNotFoundException extends ThemeException
{
    /**
     * ThemeNotFoundException constructor.
     *
     * @param  string  $themeName
     * @param  int  $code
     * @param  \Throwable|null  $previous
     */
    public function __construct(string $themeName, $code = 0, \Throwable $previous = null)
    {
        $message = "No theme found with the name '$themeName'";

        parent::__construct($message, $code, $previous);
    }
}