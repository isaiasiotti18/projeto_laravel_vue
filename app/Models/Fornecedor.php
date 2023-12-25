<?php

namespace App\Models;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fornecedor extends Model
{
  use HasFactory;

  use SoftDeletes;

  protected $table = 'fornecedores';
  protected $fillable = ['nome', 'site', 'uf', 'email'];

  public function produtos() {
    return $this->hasMany(Produto::class);
  }
}
