<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Desenvolvedor extends Model
{
    function projetos(){
        return $this->belongsToMany('App\Projeto', 'alocacaos')->withPivot('horas_semanais');
    }
}
