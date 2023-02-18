<?php

namespace Entity\DaySeven;

class FindSmallestFolderSizeOperation {
    public function execute(Folder $folder, int $minAllowedSize): ?int {
        $smallestSize = $folder->getSize();
        if ($smallestSize < $minAllowedSize) {
            $smallestSize = null;
        }

        do {
            $nextSubfolder = $folder->getNextFolder();
            if ($nextSubfolder) {
                $subfolderSize = $this->execute($nextSubfolder, $minAllowedSize);
                if ($smallestSize === null ||
                    ($subfolderSize !== null && $subfolderSize < $smallestSize)
                ) {
                    $smallestSize = $subfolderSize;
                }
            }
        } while ($nextSubfolder);

        return $smallestSize;
    }
}
