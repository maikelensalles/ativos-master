<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContratoUserSaque extends Model
{
    use SoftDeletes;
    protected $table = 'contrato_users_saques';
    protected $fillable = ['saque', 'status_saque'];
    
    public function contratouser()
    {
        return $this->belongsTo('App\ContratoUser', 'contrato_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}