<?php

class CompanyCollection
{
    public array $companies;

    public function __construct($apiData)
    {
        $this->companies = [];
        foreach ($apiData->result->records as $company) {
            $this->companies[] = new Company(
                $company->name_in_quotes,
                $company->type,
                $company->regcode,
                $company->address,
                $company->index,
                $company->registered,
            );
        }
    }

    public function getCompanies(): array
    {
        return $this->companies;
    }
}