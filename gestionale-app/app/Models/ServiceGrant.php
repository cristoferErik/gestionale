<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceGrant extends Model
{
    use HasFactory;

    protected $fillable = ['descrizione','customer_id','service_type'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function serviceweb(){
        return $this->hasOne(ServiceWeb::class);
    }
}
