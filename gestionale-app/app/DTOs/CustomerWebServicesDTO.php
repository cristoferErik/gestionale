<?php
namespace App\DTOs;

class CustomerWebServicesDTO{
    public $id;
    public $nameCustomer;
    public $servicesQuant;
    public $status;
    public $projectQuant;
    public $projectToUpdate;

    public function __construct(
            $id,
            $nameCustomer,
            $servicesQuant,
            $status,
            $projectQuant,
            $projectToUpdate
        ){
            $this->id=$id;
            $this->nameCustomer=$nameCustomer;
            $this->servicesQuant=$servicesQuant;
            $this->status=$status;
            $this->projectQuant=$projectQuant;
            $this->projectToUpdate=$projectToUpdate;
        }
}
