<?php

namespace Entity\DayTen;

class CathodeRayTube extends CentralProcessingUnit
{
    // const for the screen width
    const SCREEN_WIDTH = 40;

    private array $screenRows;
    private int $pixelPosition;


    public function reset(): void
    {
        parent::reset();
        $this->screenRows = [];
        $this->pixelPosition = 0;
    }

    public function spendCycle(): void
    {
        parent::spendCycle();
        $this->drawPixel();
    }

    public function getScreen(): string
    {
        return json_encode($this->screenRows, JSON_PRETTY_PRINT);
    }

    private function drawPixel(): void
    {
        $currentRow = intdiv($this->pixelPosition, self::SCREEN_WIDTH);
        $currentColumn = $this->pixelPosition % self::SCREEN_WIDTH;

        // CPU X register represents sprite middle position
        // sprite is 3 pixels wide
        // CRT only print pixel if sprite zone is in this range
        $pixelToPrint = ($currentColumn >= ($this->getXRegister() - 1) &&
            $currentColumn <= $this->getXRegister() + 1) ?
                '#' :
                '.'
            ;

        if (!isset($this->screenRows[$currentRow])) {
            $this->screenRows[$currentRow] = '';
        }

        $this->screenRows[$currentRow] .= $pixelToPrint;

        $this->pixelPosition++;
    }
}
