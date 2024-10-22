<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importação correta do trait
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Livro extends Model
{
    use HasFactory; 
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}