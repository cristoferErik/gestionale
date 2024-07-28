<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    
    use HasFactory;

    protected $fillable=[
        'server_url',
        'panello_url',
        'utente',
        'password',
        'customer_id'
    ];
    
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function webSite(){
        return $this->hasMany(WebSite::class);
    }
}
