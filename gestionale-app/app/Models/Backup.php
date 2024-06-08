<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    use HasFactory;

    protected $fillable=[
        'date_bk',
        'web_site_id'
    ];
    public function backup(){
        $this->belongsTo(ServiceUpdate::class);
    }
}
