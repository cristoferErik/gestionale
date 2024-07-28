<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceUpdate extends Model
{
    use HasFactory;

    protected $fillable=[
        'periodo_aggiornamento',
        'data_iniziale',
        'data_finale',
        'state',
    ];
}
