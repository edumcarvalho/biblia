<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versao extends Model
{
    use HasFactory;

    //alterando o nome da tabela
    protected $table = 'versoes';

    #campos mapeados na tabela
    protected $fillable = ['nome', 'abreviacao', 'idioma_id'];

    # aqui abaixo são realizados os relacionamentos
    //uma versão pertence a um idioma
    public function idioma()
        {
            return $this->belongsTo(Idioma::class);
        }

    //uma versão pode ter vários livros
    public function livros()
        {
            return $this->hasMany(Livro::class);
        }

}

