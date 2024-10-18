<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Importação correta do trait
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory; 
    protected $guarded = ['id'];
}