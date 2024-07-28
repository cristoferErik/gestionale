<?php
namespace App\DTO;

use Illuminate\Database\Eloquent\Model;

class RecordUpdateDTO extends Model{
    private $id;
    private $type;
    private $description;
    private $webSiteId;
    
    public function __construct($id,$type,$description,$webSiteId)
    {
        $this->id=$id;
        $this->type=$type;
        $this->description=$description;
        $this->webSiteId = $webSiteId;
    }
    public function getId(){
        return $this->id;
    }
    public function  getType(){
        return $this->type;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getWebSiteId(){
        return $this->webSiteId;
    }
}

