<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PacoteCreche extends Model
{
    protected $table = 'pacote_creche';
    protected $fillable = ['descricao','valor_mensal','porte'];
    public function creche(){
        return $this->hasMany(Creche::class,'pacoteCreche_id');
    }
}
