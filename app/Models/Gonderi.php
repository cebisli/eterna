<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gonderi extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'aciklama'];

    public $timestamps = false;

    public function GonderiPostlari(){
        return $this->hasMany('App\Models\Posta');
    }
}
