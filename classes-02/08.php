<?php

class SavingsAccount
{
    private float $balance;
    private float $totalDeposited;
    private float $totalWithdrawn;
    private float $earnedInterest;
    private float $interestRate;

    public function __construct(float $startingBalance, float $interestRate)
    {
        $this->balance = $startingBalance;
        $this->interestRate = $interestRate;
        $this->totalDeposited = 0;
        $this->totalWithdrawn = 0;
        $this->earnedInterest = 0;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }

    public function Deposit($amount): void
    {
        $this->balance += $amount;
        $this->totalDeposited += $amount;
    }

    public function Withdraw($amount): void
    {
        $this->balance -= $amount;
        $this->totalWithdrawn += $amount;
    }

    public function AddInterest(): void
    {
        $this->earnedInterest += $this->balance * $this->interestRate;
        $this->balance += $this->balance * $this->interestRate;
    }

    public function getTotalDeposited(): float
    {
        return $this->totalDeposited;
    }

    public function getTotalWithdrawn(): float
    {
        return $this->totalWithdrawn;
    }

    public function getInterestEarned(): float
    {
        return $this->earnedInterest;
    }
}

$startingBalance = (float)readline("How much money is in the account? > ");
$interestRate = (int)readline("Enter the annual interest rate> ") / 12;
$months = (int)readline("How long has the account been opened? > ");

$account = new SavingsAccount($startingBalance, $interestRate);

for ($i = 1; $i < $months + 1; $i++) {
    /*
        if ($i === 1) {
            $account->Deposit(100);
            $account->Withdraw(1000);
            $account->AddInterest();
        }
        if ($i === 2) {
            $account->Deposit(230);
            $account->Withdraw(103);
            $account->AddInterest();
        }
        if ($i === 3) {
            $account->Deposit(4050);
            $account->Withdraw(2334);
            $account->AddInterest();
        }
        if ($i === 4) {
            $account->Deposit(3450);
            $account->Withdraw(2340);
            $account->AddInterest();
        }*/
    $account->Deposit((int)readline("Enter amount deposited for month $i> "));
    $account->Withdraw((int)readline("Enter amount withdrawn for month $i> "));
    $account->AddInterest();
}

echo "Total deposited: $" . number_format($account->getTotalDeposited(), 2) . PHP_EOL;
echo "Total withdrawn: $" . number_format($account->getTotalWithdrawn(), 2) . PHP_EOL;
echo "Interest earned: $" . number_format($account->getInterestEarned(), 2) . PHP_EOL;
echo "Ending balance: $" . number_format($account->getBalance(), 2) . PHP_EOL;

