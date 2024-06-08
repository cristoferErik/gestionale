<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable=[
        'data_aggiornamento',
        'descrizione',
        'web_site_id',
    ];

    public function serviceUpdate(){
        $this->belongsTo(ServiceUpdate::class);
    }
}
