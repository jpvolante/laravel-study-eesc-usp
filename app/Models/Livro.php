<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importação correta do trait
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Spatie;


class Livro extends Model
{
    use HasFactory; 
    use \App\Traits\HasStatuses;

    const status = [
        'Solicitado',
        'Em contação',
        'Comprado'
    ];
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function tipos(){
        return[
            'Nacional',
            'Internacional'
        ];
    }

    public function getPrecoAttribute($preco){
        return number_format($preco, 2, ',', '');
    }

    public function setPrecoAttribute($preco){
        $this->attributes['preco'] = str_replace(',', '.', $preco);
    }

}