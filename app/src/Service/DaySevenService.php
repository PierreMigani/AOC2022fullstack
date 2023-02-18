<?php

namespace Service;

use Entity\DaySeven\CommandResponse;
use Entity\DaySeven\FilesystemCrawler;
use Entity\DaySeven\FindSmallestFolderSizeOperation;
use Entity\DaySeven\Folder;
use Entity\DaySeven\FolderSizeSumOperation;
use Entity\DaySeven\Shell;
use Factory\DaySeven\CommandFactory;

class DaySevenService implements DayInterface {
    private Folder $rootFolder;

    public function __construct() {
        $this->rootFolder = new Folder('/');
    }

    public function parse(array $inputLines): void
    {
        $shell = new Shell();
        $filesystemCrawler = new FilesystemCrawler($this->rootFolder);

        $currentCommand = null;
        foreach ($inputLines as $line) {
            $lineParts = explode(' ', $line);

            // command prompt starts with a '$'
            if ($lineParts[0] === '$') {
                // execute previous command
                if ($currentCommand !== null) {
                    $shell->executeCommand($currentCommand);
                }

                $currentCommand = CommandFactory::createCommand($lineParts[1], $filesystemCrawler);
                $commandArgs = array_slice($lineParts, 2);
                foreach ($commandArgs as $arg) {
                    $currentCommand->addArgument($arg);
                }
            }

            // if not a prompt, it is a command result
            else if ($currentCommand !== null) {
                $response = new CommandResponse();
                foreach ($lineParts as $part) {
                    $response->addPart($part);
                }

                $currentCommand->addResponses($response);
            }
        }

        // execute remaining command
        if ($currentCommand !== null) {
            $shell->executeCommand($currentCommand);
        }
    }

    public function computePartOne(): int
    {
        $operation = new FolderSizeSumOperation();

        $folderSizeSum = $operation->execute($this->rootFolder, 100000);

        return $folderSizeSum;
    }

    public function computePartTwo(): int
    {
        $operation = new FindSmallestFolderSizeOperation();

        // filesystem max size is always 70000000
        $remainingSpace = 70000000 - $this->rootFolder->getSize();

        // diff between current free space and 30000000 needed for update
        $minFreeSpaceNeededForUpdate = 30000000 - $remainingSpace;

        $smallestFolderSize = $operation->execute($this->rootFolder, $minFreeSpaceNeededForUpdate);

        return $smallestFolderSize;
    }
}
