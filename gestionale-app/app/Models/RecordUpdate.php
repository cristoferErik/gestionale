<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordUpdate extends Model
{
    use HasFactory;
    protected $fillable=[
        'date_record_update',
        'type_record_update',
        'description',
        'next_update',
        'web_site_id'
    ];

    public function webSite(){
        return $this->belongsTo(WebSite::class);
    }
}
