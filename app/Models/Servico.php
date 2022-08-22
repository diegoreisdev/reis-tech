<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $table = 'servicos';
    protected $fillable = ['servico', 'descricao', 'valor'];

    /* MÉTODO RESPONSÁVEL EM BUSCAR SERVIÇO */
    public static function procurar($procurar)
    {
        return self::where('servico', 'LIKE', "%{$procurar}%")->orderBy('servico')->paginate(5);
    }

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class)->withTimestamps();
    }
}
