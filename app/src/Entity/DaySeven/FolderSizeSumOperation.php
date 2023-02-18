<?php

namespace Entity\DaySeven;

class FolderSizeSumOperation {
    public function execute(Folder $folder, int $maxAllowedSize): int {
        $sum = 0;

        $folderSize = $folder->getSize();
        if ($folderSize <= $maxAllowedSize) {
            $sum += $folderSize;
        }

        // also subfolders sum to current folder sum
        do {
            $nextSubfolder = $folder->getNextFolder();
            if ($nextSubfolder) {
                $sum += $this->execute($nextSubfolder, $maxAllowedSize);
            }
        } while ($nextSubfolder);

        return $sum;
    }
}
