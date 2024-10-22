<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Http\Requests\LivroRequest;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index', [
            'livros' => $livros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livros.create', [
            'livro' => new Livro
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LivroRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;

        $livro = Livro::create($validated);
      
        return redirect("/livros/{$livro->id}");
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro)
    {
        
        return view('livros.show', [
            'livro' => $livro,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {
        return view('livros.edit', [
            'livro' => $livro
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LivroRequest $request, Livro $livro)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        $livro->update($validated);
        request()->session()->flash('alert-info', 'Livro atualizado com sucesso!');
        return redirect("/livros/{$livro->id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect('/livros');
    }
}
