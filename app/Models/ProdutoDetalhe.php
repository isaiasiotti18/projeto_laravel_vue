<?php

namespace App\Models;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdutoDetalhe extends Model
{
    use HasFactory;

    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function produto(): BelongsTo
    {
      return $this->belongsTo(Produto::class);
    }
}
