<?php

class App
{
    private DogTest $dogTest;

    public function __construct()
    {
        $this->dogTest = new DogTest();
    }

    function run()
    {
        $this->dogTest->AddDog("Rocky", "male");
        $this->dogTest->AddDog("Sparky", "male");
        $this->dogTest->AddDog("Buster", "male");
        $this->dogTest->AddDog("Sam", "male");
        $this->dogTest->AddDog("Lady", "female");
        $this->dogTest->AddDog("Molly", "female");
        $this->dogTest->AddDog("Coco", "female");

    }

    public function AddParents()
    {
        $this->dogTest->AddParents();
    }

    public function PrintAllDogs()
    {
        $this->dogTest->PrintAllDogs();
    }

}

class Dog
{
    private string $name;
    private string $sex;
    private Dog $mother;
    private Dog $father;

    public function __construct(string $name, string $sex)
    {
        $this->name = $name;
        $this->sex = $sex;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function GetSex(): string
    {
        return $this->sex;
    }

    public function SetFather(Dog $father): void
    {
        $this->father = $father;
    }

    public function SetMother(Dog $mother): void
    {
        $this->mother = $mother;
    }

    public function GetFathersName(): string
    {
        return $this->father->name ?? "Unknown";
    }

    public function GetMothersName(): string
    {
        return $this->mother->name ?? "Unknown";
    }
}

class DogTest
{
    public array $dogs;

    public function __construct()
    {
        $this->dogs = [];
    }

    public function AddDog(string $name, string $sex)
    {
        $this->dogs[] = new Dog($name, $sex);
    }

    public function AddParents()
    {
        /** @var Dog $dog */
        $this->dogs[0]->SetFather($this->dogs[1]);
        $this->dogs[0]->SetMother($this->dogs[5]);

        $this->dogs[6]->SetFather($this->dogs[3]);
        $this->dogs[6]->SetMother($this->dogs[6]);

        $this->dogs[1]->SetFather($this->dogs[4]);
        $this->dogs[1]->SetMother($this->dogs[6]);

        $this->dogs[3]->SetFather($this->dogs[2]);
        $this->dogs[3]->SetMother($this->dogs[5]);
    }

    public function PrintAllDogs()
    {
        /** @var Dog $dog */
        foreach ($this->dogs as $dog) {
            echo "{$dog->GetName()}, {$dog->GetSex()} \t";
            echo "father: {$dog->GetFathersName()} | mother: {$dog->GetMothersName()}\n";
        }
    }
}

$app = new App();
$app->run();
$app->AddParents();
$app->PrintAllDogs();
