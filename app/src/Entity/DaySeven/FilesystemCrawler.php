<?php

namespace Entity\DaySeven;


class FilesystemCrawler
{
    private Folder $currentFolder;

    public function __construct(
        private Folder $rootFolder,
    ) {
        $this->currentFolder = $rootFolder;
    }

    public function getCurrentFolder(): Folder
    {
        return $this->currentFolder;
    }

    public function getRootFolder(): Folder
    {
        return $this->rootFolder;
    }

    public function goToSubfolder(string $folderName): void
    {
        $subFolder = $this->currentFolder->getSubfolder($folderName);
        if (!$subFolder) {
            $subFolder = new Folder($folderName);
            $this->currentFolder->addFolder($subFolder);
        }

        $this->currentFolder = $subFolder;
    }

    public function goToParentFolder(): void
    {
        $parentFolder = $this->currentFolder->getParentFolder();
        if (!$parentFolder) {
            throw new \Exception('Cannot go to parent folder');
        }

        $this->currentFolder = $parentFolder;
    }

    public function goToRootFolder(): void
    {
        $this->currentFolder = $this->rootFolder;
    }

    public function addNewFile(string $fileName, int $fileSize): void
    {
        $file = new File($fileName, $fileSize);
        $this->currentFolder->addFile($file);
    }

    public function addNewFolder(string $folderName): void
    {
        if ($this->currentFolder->hasSubfolder($folderName)) {
            return;
        }

        $folder = new Folder($folderName);
        $this->currentFolder->addFolder($folder);
    }
}
