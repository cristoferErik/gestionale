<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceWeb extends Model
{
    use HasFactory;
    //protected $primaryKey = 'web_id';

    
    protected $fillable=
    [
        'service_grant_id'
    ];

    public function service(){
        return $this->belongsTo(ServiceGrant::class);
    }
    public function server(){
        return $this->hasMany(Server::class);
    }
    public function webSite(){
        return $this->hasMany(WebSite::class);
    }
}
