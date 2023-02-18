<?php

namespace Entity\DaySeven;

class LsCommand extends AbstractCommand
{
    public function __construct(
        protected FilesystemCrawler $filesystemCrawler,
    ) {
        parent::__construct($filesystemCrawler, 'ls');
    }

    public function execute(): void
    {
        foreach ($this->responses as $response) {
            $responseParts = $response->getParts();

            $firstResponsePart = $responseParts[0] ?? null;
            $filesystemElementName = $responseParts[1] ?? '';

            if ($firstResponsePart === 'dir') {
                $this->filesystemCrawler->addNewFolder($filesystemElementName);
                continue;
            }

            $fileSize = intval($firstResponsePart);
            $this->filesystemCrawler->addNewFile($filesystemElementName, $fileSize);
        }
    }
}
