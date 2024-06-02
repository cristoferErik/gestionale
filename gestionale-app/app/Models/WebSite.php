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
    public function serviceWeb(){
        return $this->belongsTo(ServiceWeb::class);
    }
}
