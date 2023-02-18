<?php

namespace Entity\DaySix;

class Device {
    private array $datastream;
    private array $savedDatastream;

    public function __construct()
    {
        $this->datastream = [];
        $this->savedDatastream = [];
    }

    public function addData(string $data): void
    {
        // split data into single characters
        $this->datastream = array_merge($this->datastream, str_split($data));
    }

    public function sendData(): ?string
    {
        return array_shift($this->datastream);
    }

    public function saveDatastream(): void
    {
        $this->savedDatastream = $this->datastream;
    }

    public function restoreDatastream(): void
    {
        $this->datastream = $this->savedDatastream;
    }
}
