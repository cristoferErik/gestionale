<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    use HasFactory;

    protected $fillable=[
        'id'
    ];
    public function recordUpdate(){
        return $this->belongsTo(RecordUpdate::class,'id','record_update_id');
    }
}
