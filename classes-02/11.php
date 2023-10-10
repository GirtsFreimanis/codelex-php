<?php

class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function Get_Name(): string
    {
        return $this->name;
    }

    public function Get_Balance(): float
    {
        return $this->balance;
    }

    public function Get_Account_Information(): string
    {
        return "{$this->Get_Name()}, balance: {$this->Get_Balance()}";
    }

    public function Withdrawal(float $amount): void
    {
        $this->balance -= $amount;
    }

    public function Deposit(float $amount): void
    {
        $this->balance += $amount;
    }

    public static function Transfer(Account $from, Account $to, int $amount): void
    {
        $from->balance -= $amount;
        $to->balance += $amount;
    }
}


$bartos_account = new Account("Barto's account", 100.00);
$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state\n";
echo "{$bartos_account->Get_Account_Information()}\n";
echo "{$bartos_swiss_account->Get_Account_Information()}\n";

echo "Transactions\n";
$bartos_account->Withdrawal(20);
echo "{$bartos_account->Get_Name()} balance is now: {$bartos_account->Get_Balance()}\n";
$bartos_swiss_account->Deposit(200);
echo "{$bartos_swiss_account->Get_Name()} balance is now: {$bartos_swiss_account->Get_Balance()}\n";

echo "Final state\n";
echo "{$bartos_account->Get_Account_Information()}\n";
echo "{$bartos_swiss_account->Get_Account_Information()}\n";

echo str_repeat("=", 30) . PHP_EOL;

$matts_account = new Account("Matt's account", 1000);
$my_account = new Account("My account", 0);

$matts_account->Withdrawal(100);
$my_account->Deposit(100);

echo "{$matts_account->Get_Account_Information()}\n";
echo "{$my_account->Get_Account_Information()}\n";

echo str_repeat("=", 30) . PHP_EOL;

$A = new Account("A", 100);
$B = new Account("B", 0);
$C = new Account("B", 0);

Account::Transfer($A, $B, 50);
Account::Transfer($B, $C, 25);

echo "{$A->Get_Account_Information()}\n";
echo "{$B->Get_Account_Information()}\n";
echo "{$C->Get_Account_Information()}\n";


