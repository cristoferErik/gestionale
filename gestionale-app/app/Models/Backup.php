<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    use HasFactory;

    protected $fillable=[
        'record_update_id'
    ];
    public function recordUpdate(){
        return $this->belongsTo(RecordUpdate::class);
    }
}
