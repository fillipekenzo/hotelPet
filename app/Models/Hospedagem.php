<?php
namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Hospedagem extends Model
{
    protected $table = 'hospedagem';
    protected $fillable = ['data_entrada','data_saida','valor_diaria','observacoes','status','pet_id','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pet(){
        return $this->belongsTo(Pet::class);
    }
}