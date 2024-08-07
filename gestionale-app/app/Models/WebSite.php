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
        'date_creation',
        'next_update',
        'server_id',
        'service_update',
    ];
    public function server(){
        return $this->belongsTo(Server::class);
    }
    public function recordUpdate(){
        return $this->hasMany(RecordUpdate::class);
    }
}
