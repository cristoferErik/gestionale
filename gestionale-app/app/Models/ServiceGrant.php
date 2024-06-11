<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceGrant extends Model
{
    use HasFactory;

    protected $fillable = [
        'descrizione',
        'data_service',
        'service_type',
        'customer_id'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function serviceWeb(){
        return $this->hasOne(ServiceWeb::class);
    }

}
