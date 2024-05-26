<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    
    use HasFactory;

    protected $fillable=[
        'server_url',
        'panello_url',
        'utente',
        'password',
        'service_web_id'
    ];

    public function serviceWeb(){
        return $this->belongsTo(ServiceWeb::class,'service_web_id');
    }

}
