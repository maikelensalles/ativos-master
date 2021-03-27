<?php namespace App\Observers;

use App\Novidade;

class NovidadeObserver 
{
    public function creating(Novidade $model)
    {
        $model->user_id = auth()->user()->id;
    }
}