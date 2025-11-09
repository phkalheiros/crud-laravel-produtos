<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    // CORRIGIDO: Esta linha é essencial para o seu projeto, 
    // pois força o Laravel a usar a tabela 'produto' (singular), 
    // que é a que existe no seu banco de dados.
    protected $table = 'produto';
    
    // CORRIGIDO: Esta lista permite que todos esses campos 
    // sejam preenchidos em massa (mass assignment) a partir do formulário.
    protected $fillable = [
        'descricao', 
        'qtd', 
        'precoUnitario', 
        'precoVenda'
    ];
}