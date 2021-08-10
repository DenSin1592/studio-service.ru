<?php

namespace App\Console\Commands;

use App\Services\Sitemap\SitemapGenerator;
use Illuminate\Console\Command;

class SitemapGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sitemap-generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap.xml';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param SitemapGenerator $sitemapGenerator
     */
    public function handle(SitemapGenerator $sitemapGenerator)
    {
        $sitemapGenerator->generate();
    }
}
