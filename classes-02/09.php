<?php

class BankAccount
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): float
    {
        return $this->balance < 0 ? $this->balance * -1 : $this->balance;
    }

    public function show_User_Name_and_Bank_Balance(): string
    {
        return $this->getName() . ", $" . number_format($this->getBalance(), 2);
    }
}

$ben = new BankAccount("Benson", -17.20);
echo $ben->show_User_Name_and_Bank_Balance();