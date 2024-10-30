<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class ImagemController extends Controller
{
    public function mostrar($filename)
    {
        $path = storage_path('app/private/uploads/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
}
