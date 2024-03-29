<?php

namespace Entity\DaySeven;

class Shell
{
    private array $history;

    public function executeCommand(AbstractCommand $command): void
    {
        $command->execute();
        $this->history[] = $command;
    }
}
