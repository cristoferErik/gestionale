<?php
namespace App\DTOs;

class CustomerWebServicesDTO{
    public $id;
    public $nameCustomer;
    public $projectQuant;
    public $projectUpdated;
    public $projectToUpdate;

    public function __construct(
            $id,
            $nameCustomer,
            $projectQuant,
            $projectUpdated,
            $projectToUpdate
        ){
            $this->id=$id;
            $this->nameCustomer=$nameCustomer;
            $this->projectQuant=$projectQuant;
            $this->projectUpdated=$projectUpdated;
            $this->projectToUpdate=$projectToUpdate;
        }
}
