<?php

namespace Entity\DaySeven;

class Folder
{
    private array $files;
    private array $folders;
    private array $fileIndexes;
    private array $folderIndexes;
    private ?Folder $parentFolder;

    public function __construct(
        private string $name,
    ) {
        $this->files = [];
        $this->folders = [];
        $this->fileIndexes = [];
        $this->folderIndexes = [];
        $this->parentFolder = null;
    }

    public function addFile(File $file): void
    {
        $this->files[$file->getName()] = $file;
        $this->fileIndexes[] = $file->getName();
    }

    public function addFolder(Folder $folder): void
    {
        $folder->setParentFolder($this);

        $this->folders[$folder->getName()] = $folder;
        $this->folderIndexes[] = $folder->getName();
    }

    public function hasSubfolder(string $folderName): bool
    {
        return isset($this->folders[$folderName]);
    }

    public function getSubfolder(string $folderName): ?Folder
    {
        return $this->folders[$folderName] ?? null;
    }

    public function getParentFolder(): ?Folder
    {
        return $this->parentFolder;
    }

    public function setParentFolder(Folder $folder): void
    {
        $this->parentFolder = $folder;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSize(): int
    {
        $size = 0;

        foreach ($this->files as $file) {
            $size += $file->getSize();
        }

        foreach ($this->folders as $folder) {
            $size += $folder->getSize();
        }

        return $size;
    }

    public function getNextFile(): ?File
    {
        $fileName = array_shift($this->fileIndexes);
        if (!$fileName) {
            // refill the indexes to loop over the files again if needed
            $this->fileIndexes = array_keys($this->files);
            return null;
        }

        return $this->files[$fileName] ?? null;
    }

    public function getNextFolder(): ?Folder
    {
        $folderName = array_shift($this->folderIndexes);
        if (!$folderName) {
            // refill the indexes to loop over the folders again if needed
            $this->folderIndexes = array_keys($this->folders);
            return null;
        }

        return $this->folders[$folderName] ?? null;
    }
}
