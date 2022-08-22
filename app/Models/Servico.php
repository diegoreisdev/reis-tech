<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';
    protected $fillable = ['servico', 'descricao', 'valor'];

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class)->withTimestamps();
    }
}
