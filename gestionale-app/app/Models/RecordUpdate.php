<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordUpdate extends Model
{
    use HasFactory;
    protected $fillable=['web_site_id','last_update'];

    public function backup(){
        return $this->hasOne(Backup::class,'id');
    }
    public function maintenance(){
        return $this->hasOne(Maintenance::class,'id');
    }
    public function webSite(){
        return $this->belongsTo(WebSite::class);
    }
    
}
