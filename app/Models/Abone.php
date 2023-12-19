<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abone extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'ad', 'soyad', 'mail', 'updated_at', 'created_at'];

    public $timestamps = false;

    public function AbonePostlari(){
        return $this->hasMany('App\Models\Posta');
    }

}
