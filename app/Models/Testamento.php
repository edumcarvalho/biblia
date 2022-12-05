<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testamento extends Model
{
    use HasFactory;

    // protected $table = "testamentos";
    // protected $primarykey = "nome_chave_primaria";

    protected $fillable = [ 'nome' ];

    // caso eu não queira utilizar o campo criado timestamp
    //public $timeStamps = false;

    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
    
}
