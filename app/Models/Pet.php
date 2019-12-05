<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pet';
    protected $fillable = ['nome','raca','peso','status','foto','tutor_id'];

    public function tutor(){
        return $this->belongsTo(Tutor::class);
    }
    public function creche(){
        return $this->hasMany(Creche::class,'pet_id');
    }
    public function hospedagem(){
        return $this->hasMany(Hospedagem::class,'pet_id');
    }
}
