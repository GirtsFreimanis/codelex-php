<?php

class Product
{
    private string $name;
    private float $price;
    private int $amount;

    public function __construct(string $name, float $price, int $amount)
    {
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }
}

$products = [
    new Product("Logitech mouse", 70.00, 14),
    new Product("iPhone 5s", 999.99, 3),
    new Product("Epson EB-U05", 440.46, 1),
];


$choice = "o";
while ($choice != "q") {
    $choice = (string)readline("'p' to print, 'e' to edit> ");
    if ($choice === "p") {
        foreach ($products as $i => $product) {
            echo $i . ". " . $product->getName() . ", ";
            echo $product->getPrice() . " EUR, ";
            echo $product->getAmount() . PHP_EOL;
        }
    }
    if ($choice === "e") {
        $selectedProduct = (int)readline("index of product to edit> ");
        if (!isset($products[$selectedProduct])) {
            echo "product not found\n";
            continue;
        }
        $whatToChange = readline("'amount' or 'price'> ");

        if ($whatToChange === "price") {
            $price = (float)readline("enter price> ");
            $products[$selectedProduct]->setPrice($price);
        }

        if ($whatToChange === "amount") {
            $amount = (int)readline("enter amount> ");
            $products[$selectedProduct]->setAmount($amount);
        }
    }
}