<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemDetalhe extends Model
{
  use HasFactory;

  protected $table = 'produto_detalhes';

  protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

  public function produto(): BelongsTo
  {
    return $this->belongsTo(Item::class, );
  }
}
