<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $fillable = ['nome', 'contato', 'endereco'];

    /* MÉTODO RESPONSÁVEL EM BUSCAR CLIENTE */
    public static function procurar($procurar)
    {
        return self::where('nome', 'LIKE', "%{$procurar}%")->orderBy('nome')->paginate(5);
    }

    public function servicos()
    {
        return $this->belongsToMany(Servico::class)->withTimestamps();
    }
}
