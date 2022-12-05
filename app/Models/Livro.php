<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [ 'nome', 'posicao', 'abreviacao', 'testamento_id' ];

    // pega o testamento a que pertence o livro
    public function testamento()
    {
        return $this->belongsTo(Testamento::class);
    }

    //pegar todos os versiculos vinculados
    public function versiculos()
    {
        return $this->hasMany(Versiculo::class);
    }
}
