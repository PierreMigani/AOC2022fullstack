<?php

namespace Entity\DaySeven;


abstract class AbstractCommand
{
    protected array $arguments;
    protected array $responses;

    public function __construct(
        protected FilesystemCrawler $filesystemCrawler,
        private string $name,
    ) {
        $this->arguments = [];
        $this->responses = [];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addArgument(string $param): void
    {
        $this->arguments[] = $param;
    }

    public function addResponses(CommandResponse $response): void
    {
        $this->responses[] = $response;
    }

    abstract public function execute(): void;
}
