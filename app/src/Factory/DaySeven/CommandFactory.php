<?php

namespace Factory\DaySeven;

use Entity\DaySeven\AbstractCommand;
use Entity\DaySeven\CdCommand;
use Entity\DaySeven\FilesystemCrawler;
use Entity\DaySeven\LsCommand;

class CommandFactory
{
    static public function createCommand(string $commandName, FilesystemCrawler $filesystemCrawler): ?AbstractCommand
    {
        switch ($commandName) {
            case 'ls':
                return new LsCommand($filesystemCrawler);
            case 'cd':
                return new CdCommand($filesystemCrawler);
            default:
                return null;
        }
    }
}
