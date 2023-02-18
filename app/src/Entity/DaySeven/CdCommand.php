<?php

namespace Entity\DaySeven;

class CdCommand extends AbstractCommand
{
    public function __construct(
        protected FilesystemCrawler $filesystemCrawler,
    ) {
        parent::__construct($filesystemCrawler, 'cd');
    }

    public function execute(): void
    {
        $folderName = $this->arguments[0] ?? null;

        if ($folderName === null || $folderName === '/') {
            $this->filesystemCrawler->goToRootFolder();

            return;
        }

        if ($folderName === '..') {
            $this->filesystemCrawler->goToParentFolder();

            return;
        }

        $this->filesystemCrawler->goToSubfolder($folderName);
    }
}
