<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable=[
        'date_update',
        'descrizione',
        'record_update_id',
    ];

    public function RecordUpdate(){
        return $this->belongsTo(RecordUpdate::class);
    }
}
