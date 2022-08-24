<?php
namespace Wireless;

use App\Crawler;

class AppController
{
    public function runCommand(array $argv)
    {
		$crawler = new Crawler('https://wltest.dns-systems.net/');
		$crawler->crawl();
    }
}