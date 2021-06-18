<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diarista extends Model
{
    use HasFactory;

    //Define os campos que serão preenchidos na aplicação;
    protected $fillable = ['nome_completo', 'cpf', 'email', 'telefone', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep', 'codigo_ibge', 'foto_usuario'];

    //Define os campos que serão visualizados na serialização;
    protected $visible = ['nome_completo', 'cidade', 'foto_usuario', 'reputacao'];

    //Adiciona campos na serialização;
    protected $appends = ['reputacao'];

    //Monta a URL da imagem;
    public function getFotoUsuarioAttribute(string $valor) 
    {
        return config('app.url') . '/' . $valor;
    }

    //Retorna um número aleatório para a reputação;
    public function getReputacaoAttribute($valor)
    {
        return mt_rand(1, 5);
    }

    static public function buscaPorCodigoIbge(int $codigoIbge) 
    {
        return self::where('codigo_ibge', $codigoIbge)->limit(6)->get();
    }

    static public function quantidadePorCodigoIbge(int $codigoIbge) 
    {
        $quantidade = self::where('codigo_ibge', $codigoIbge)->count();

        return $quantidade > 6 ? $quantidade - 6 : 0;
    }

}
