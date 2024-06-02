<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceUpdate extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'periodo_aggiornamento'
        ,'tipo'
        ,'data_ini'
        ,'data_fin'
        ,'status'
        ,'costo'
        ,'web_site_id'
    ];
}
