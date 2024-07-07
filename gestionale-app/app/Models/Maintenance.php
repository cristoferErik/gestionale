<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable=[
        'descrizione',
        'id',
    ];

    public function recordUpdate(){
        return $this->belongsTo(RecordUpdate::class,'id','id');
    }
}
