<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordUpdate extends Model
{
    use HasFactory;
    protected $fillable=['web_site_id','record_date'];

    public function backup(){
        return $this->hasOne(Backup::class);
    }
    public function maintenance(){
        return $this->hasOne(Maintenance::class);
    }
    public function webSite(){
        return $this->belongsTo(WebSite::class);
    }
    
}
