<?php

namespace WTG\Theme\Console;

use Illuminate\Console\Command;

/**
 * Change theme command.
 *
 * @package     WTG\Theme
 * @subpackage  Console
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class ChangeThemeCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = "theme:change {name : Name of the theme}";

    /**
     * @var string
     */
    protected $description = "Change the active theme";

    /**
     * Handle the command.
     *
     * @return void
     */
    public function handle()
    {
        $this->output->comment('Command fired!');
    }
}