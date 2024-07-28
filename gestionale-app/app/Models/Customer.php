<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{   
    use HasFactory;
    protected $fillable = ['name','descrizione','citta','email','address','cellphone'];

    public function serviceGrant(){
        return $this->hasMany(Server::class);
    }
}
