<?php

namespace WTG\Theme;

use Illuminate\Support\ServiceProvider;

/**
 * Theme service provider.
 *
 * @package     WTG\Theme
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\ListThemesCommand::class,
                Console\ChangeThemeCommand::class,
            ]);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\WTG\Theme\Contracts\ThemeScanner::class, ThemeScanner::class);
    }
}