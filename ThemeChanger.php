<?php

namespace WTG\Theme;

use WTG\Theme\Contracts\ThemeScanner;

/**
 * Theme changer.
 *
 * @package     WTG\Theme
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class ThemeChanger
{
    /**
     * @var ThemeScanner
     */
    protected $scanner;

    /**
     * ThemeChanger constructor.
     * @param  ThemeScanner  $scanner
     */
    public function __construct(ThemeScanner $scanner)
    {
        $this->scanner = $scanner;
    }

    /**
     * Change to the given theme.
     *
     * @param  string  $themeName
     */
    public static function theme(string $themeName)
    {
        $changer = app()->make(static::class);
        $changer->setTheme($themeName);
    }

    /**
     * Set the active theme.
     *
     * @param  string  $themeName
     * @throws ThemeNotFoundException
     */
    public function setTheme(string $themeName)
    {
        if ($theme = $this->lookupTheme($themeName)) {
            //
        } else {
            throw new ThemeNotFoundException($themeName);
        }
    }

    /**
     * Find a theme.
     *
     * @param  string  $themeName
     * @return bool
     */
    public function lookupTheme(string $themeName): bool
    {
        $themes = $this->scanner->scan();

        return $themes->first(function (Metadata $theme) use ($themeName) {
            return $theme->name === $themeName;
        });
    }
}