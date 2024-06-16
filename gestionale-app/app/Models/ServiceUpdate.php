<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceUpdate extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'update_period',
        'date_ini',
        'date_end',
        'status',
        'costo',
        'service_grant_id'
    ];
    public function serviceGrant(){
        return $this->belongsTo(ServiceGrant::class);
    }
    public function webSite(){
        return $this->hasMany(WebSite::class);
    }
    
}
