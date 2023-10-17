<?php

require_once "CompanyCollection.php";
require_once "Company.php";

class CompanyApplication
{
    private CompanyCollection $companies;

    public function run()
    {
        $search = readline("Enter company name or registry Nr.> ");
        if (empty($search)) {
            echo "No input\n";
            exit;
        }
        $search = str_replace(" ", "%20", $search);
        $apiData = json_decode(file_get_contents(
            "https://data.gov.lv/dati/lv/api/3/action/datastore_search?q="
            . $search . "&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9"));
        if (empty($apiData->result->records)) {
            echo "No companies found!\n";
            exit;
        }
        $this->initialize($apiData);
        $this->print();
    }

    public function initialize($apiData)
    {
        $this->companies = new CompanyCollection($apiData);
    }

    public function print(): void
    {
        /* @var Company $company */
        foreach ($this->companies->getCompanies() as $company) {
            echo str_repeat("=", 25) . "\n";
            echo "Name: " . $company->getName() . "\n";
            echo "Type: " . $company->getType() . "\n";
            echo "Reg. code: " . $company->getRegcode() . "\n";
            echo "Address: " . $company->getAddress() . ", LV-{$company->getIndex()}\n";
            echo "Registered: " . $company->getRegistered() . "\n";
        }
    }
}

$app = new CompanyApplication();
$app->run();

