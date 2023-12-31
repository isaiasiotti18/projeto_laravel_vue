<?php

namespace App\Models;

use App\Models\Pedido;
use App\Models\Fornecedor;
use App\Models\ProdutoDetalhe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
  use HasFactory;

  protected $table = 'produtos';
  protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

  public function produtoDetalhe() {
    return $this->hasOne(ProdutoDetalhe::class);
  }

  public function fornecedor() {
    return $this->belongsTo(Fornecedor::class);
  }

  public function pedidos() {

    /*
      3 - representa o nome da fk da tabela mapeada (produtos) na tabela de relacionamento
      4 - representa o nome da fk da tabela mapeada (pedidos) que queremos puxar os dados
    */

    return $this->belongsToMany(
      Pedido::class,
      'pedidos_produtos',
      'produto_id',
      'pedido_id'
    );
  }
}
