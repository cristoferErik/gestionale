<?php
namespace App\DTOs;

class CustomerTypeOfServicesDTO{
    public $id;
    public $nameCustomer;
    public $nameServices;
    public $typeUpdate;
    public $dateUpdate;

    public function __construct($id,$nameCustomer,$nameServices,$typeUpdate,$dateUpdate){
        $this->id=$id;
        $this->nameCustomer=$nameCustomer;
        $this->nameServices=$nameServices;
        $this->typeUpdate=$typeUpdate;
        $this->dateUpdate=$dateUpdate;
    }
}
