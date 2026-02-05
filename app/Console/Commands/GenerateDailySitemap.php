<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SitemapController;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap XML file';

    public function handle()
    {
        $this->info('Generating sitemap...');

        $controller = new SitemapController();
        $data = $controller->getSitemapData();
        $controller->generateXml($data);

        $this->info('Sitemap generated successfully!');
    }
}
