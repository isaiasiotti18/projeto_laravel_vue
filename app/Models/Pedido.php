<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id'];

    public function produtos(): BelongsToMany {
      return $this->belongsToMany(Produto::class, 'pedidos_produtos');
    }
}
