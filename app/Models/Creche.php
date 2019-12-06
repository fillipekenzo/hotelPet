<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Creche extends Model
{
    protected $table = 'creche';
    protected $fillable = ['data','observacoes','status','pet_id','user_id','pacote_creche_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pet(){
        return $this->belongsTo(Pet::class);
    }
    public function pacoteCreche(){
        return $this->belongsTo(PacoteCreche::class);
    }
}
