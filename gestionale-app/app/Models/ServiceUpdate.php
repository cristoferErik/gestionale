<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceUpdate extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'periodo_aggiornamento',
        'data_inizio',
        'date_scadenza',
        'status',
        'costo',
        'service_web_id'
    ];
    public function ServiceWeb(){
        return $this->hasMany(ServiceWeb::class);
    }
}
