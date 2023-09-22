<?php
//create employees as objects
function createEmployee(string $name, float $basePay, int $hoursWorked): stdClass
{
    $employee = new stdClass();
    $employee->name = $name;
    $employee->basePay = $basePay;
    $employee->hoursWorked = $hoursWorked;
    return $employee;
}

$employees = [
    $Employee1 = createEmployee("Employee1", 7.50, 35),
    $Employee2 = createEmployee("Employee2", 8.20, 47),
    $Employee3 = createEmployee("Employee3", 10.00, 73)
];
//function that returns employee pay or error
function employeePay(float $basePay, int $hoursWorked)
{
    if ($basePay < 8.00 || $hoursWorked > 60) {
        return "base pay or hours worked don't comply";
    }
    return $basePay * $hoursWorked;
}

//calculate each employee pay
foreach ($employees as $employee) {
    echo "$employee->name: " . employeePay($employee->basePay, $employee->hoursWorked) . PHP_EOL;
}
