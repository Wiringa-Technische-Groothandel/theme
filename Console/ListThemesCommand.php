<?php

namespace WTG\Theme\Console;

use Illuminate\Console\Command;
use WTG\Theme\ThemeScanner;

/**
 * Change theme command.
 *
 * @package     WTG\Theme
 * @subpackage  Console
 * @author      Thomas Wiringa  <thomas.wiringa@gmail.com>
 */
class ListThemesCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = "theme:list";

    /**
     * @var string
     */
    protected $description = "List the installed themes";

    /**
     * @var ThemeScanner
     */
    protected $scanner;

    /**
     * ListThemesCommand constructor.
     *
     * @param  ThemeScanner  $scanner
     */
    public function __construct(ThemeScanner $scanner)
    {
        parent::__construct();

        $this->scanner = $scanner;
    }

    /**
     * Handle the command.
     *
     * @return void
     */
    public function handle()
    {
        $tableHeaders = ['name', 'description', 'author', 'version', 'license'];

        $themes = $this->scanner->scan();

        $this->output->success('Themes found: ' . count($themes));
        $this->table($tableHeaders, $themes);
    }
}