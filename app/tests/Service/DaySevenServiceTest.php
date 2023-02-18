<?php

include_once __DIR__ . '/../../src/Service/DayInterface.php';
include_once __DIR__ . '/../../src/Service/DaySevenService.php';
include_once __DIR__ . '/../../src/Entity/DaySeven/AbstractCommand.php';
include_once __DIR__ . '/../../src/Entity/DaySeven/CdCommand.php';
include_once __DIR__ . '/../../src/Entity/DaySeven/FilesystemCrawler.php';
include_once __DIR__ . '/../../src/Entity/DaySeven/LsCommand.php';
include_once __DIR__ . '/../../src/Entity/DaySeven/CommandResponse.php';
include_once __DIR__ . '/../../src/Entity/DaySeven/Shell.php';
include_once __DIR__ . '/../../src/Factory/DaySeven/CommandFactory.php';
include_once __DIR__ . '/../../src/Entity/DaySeven/Folder.php';
include_once __DIR__ . '/../../src/Entity/DaySeven/File.php';
include_once __DIR__ . '/../../src/Entity/DaySeven/FolderSizeSumOperation.php';
include_once __DIR__ . '/../../src/Entity/DaySeven/FindSmallestFolderSizeOperation.php';

use PHPUnit\Framework\TestCase;
use Service\DaySevenService;

class DaySevenServiceTest extends TestCase
{
    public function testParseAndCompute(): void
    {
        $service = new DaySevenService();

        $service->parse([
            "$ cd /",
            "$ ls",
            "dir a",
            "14848514 b.txt",
            "8504156 c.dat",
            "dir d",
            "$ cd a",
            "$ ls",
            "dir e",
            "29116 f",
            "2557 g",
            "62596 h.lst",
            "$ cd e",
            "$ ls",
            "584 i",
            "$ cd ..",
            "$ cd ..",
            "$ cd d",
            "$ ls",
            "4060174 j",
            "8033020 d.log",
            "5626152 d.ext",
            "7214296 k"
        ]);

        $this->assertEquals(95437, $service->computePartOne());
        $this->assertEquals(24933642, $service->computePartTwo());
    }
}
