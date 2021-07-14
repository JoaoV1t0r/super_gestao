<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedor extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'fornecedores';
    protected $fillable = [
        'nome',
        'site',
        'uf',
        'email'
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'fornecedor_id', 'id');
    }
}