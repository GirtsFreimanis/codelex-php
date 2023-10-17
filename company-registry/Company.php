<?php

class Company
{
    private string $name;
    private string $type;
    private int $regcode;
    private string $address;
    private int $index;
    private string $registered;

    public function __construct(
        string $name,
        string $type,
        int    $regcode,
        string $address,
        int    $index,
        string $registered
    )
    {
        $this->name = $name;
        $this->type = $type;
        $this->regcode = $regcode;
        $this->address = $address;
        $this->index = $index;
        $this->registered = $registered;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getRegcode(): int
    {
        return $this->regcode;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getRegistered(): string
    {
        return $this->registered;
    }
}