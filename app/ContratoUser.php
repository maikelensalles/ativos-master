<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContratoUser extends Model
{
    use SoftDeletes;
    protected $table = 'contrato_users';
    protected $fillable = ['valor', 'saque', 'status', 'status_saque', 'contrato_id', 'user_id'];
    
    public function contrato()
    {
        return $this->belongsTo('App\Contrato', 'contrato_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function contratousersaque() {
        return $this->hasMany('App\ContratoUserSaque');
    }

    public function usersaldo() {
        return $this->hasMany('App\UserSaldo');
    }
}