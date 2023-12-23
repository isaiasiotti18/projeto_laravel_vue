<?php

namespace App\Models;

use App\Models\ProdutoDetalhe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
  use HasFactory;

  protected $table = 'produtos';
  protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

  public function produtoDetalhe() {
    return $this->hasOne(ProdutoDetalhe::class);
  }
}
