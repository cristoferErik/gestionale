<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSite extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'nome',
        'url',
        'costo',
        'data_creazione',
        'server_id'
    ];
    public function server(){
        return $this->belongsTo(Server::class);
    }
    public function backup(){
        return $this->hasMany(Backup::class);
    }
    public function maintenance(){
        return $this->hasMany(Maintenance::class);
    }
}
