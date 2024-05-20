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
        'web_id'
    ];

    public function web(){
        return $this->belongsTo(Web::class,'web_id');
    }

}
