<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    use HasFactory;
    //protected $primaryKey = 'web_id';

    
    protected $fillable=
    [
        'costo_annuale',
        'aggiornamento',
        'ultimo_bk',
        'scadenza',
        'gestito',
    ];

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function server(){
        return $this->hasMany(Server::class,'web_id' );
    }
}
