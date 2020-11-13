<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novidade extends Model
{
    protected $table = 'novidades';

    protected $fillable = ['titulo', 'sub_titulo', 'descricao', 'descricao_longa', 'image', 'descricao_media', 'obs'];

}
