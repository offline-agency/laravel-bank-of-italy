<?php

namespace OfflineAgency\LaravelBankOfItaly\Entities;

class Error
{
    protected string $error;

    public function __construct(string $error)
    {
        $this->setError($error);
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function setError(string $error): void
    {
        $this->error = $error;
    }
}
