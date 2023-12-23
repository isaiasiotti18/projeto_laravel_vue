<?php

namespace App\Models;

use App\Models\ItemDetalhe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
  use HasFactory;

  protected $table = 'produtos';
  protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

  public function produtoDetalhe() {
    return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id');
  }
}
