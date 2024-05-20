<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['descrizione','customer_id','type'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function web(){
        return $this->hasOne(Web::class,'service_id');
    }
}
