<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{   
    use HasFactory;
    protected $fillable = ['name_cliente','descrizione','citta','email','address','cellphone'];

    public function services(){
        return $this->hasMany(ServiceGrant::class);
    }
}
