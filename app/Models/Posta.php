<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posta extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'abone_id', 'gonderi_id', 'updated_at'];

    public function abone(){
        return $this->belongsTo('App\Models\Abone');
    }

    public function gonderi(){
        return $this->belongsTo('App\Models\Gonderi');
    }
}
