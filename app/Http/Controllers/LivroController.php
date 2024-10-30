<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLivroRequest;
use App\Http\Requests\UpdateLivroRequest;
use App\Http\Requests\LivroRequest;
use App\Service\LivroStepper;
use Storage;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        if(isset(request()->search)){
            $livros = Livro::where('autor', 'LIKE', "%{$request->search}%") 
            ->orWhere("titulo","LIKE", "%{$request->search}%")->paginate(5);
        }else{
            $livros = Livro::paginate(5);
        }

        $stepper = new LivroStepper();

        return view('livros.index', [
            'livros' => $livros,
            'stepper' => $stepper->render()
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

        $livro->setStatus('Solicitado');
      
        return redirect("/livros/{$livro->id}");
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro, LivroStepper $stepper)
    {

        $stepper->setCurrentStepName($livro->status);
        
        return view('livros.show', [
            'livro' => $livro,
            'stepper' => $stepper->render()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {
        // Gera a URL acessível para a imagem
        $livro->image_url = Storage::url($livro->caminho_arquivo);
    
        $stepper = new LivroStepper();
        return view('livros.edit', [
            'livro' => $livro,
            'stepper' => $stepper->render()
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

    public function cotacao(Livro $livro)
    {
        $livro->setStatus('Em cotação');
        return redirect("/livros/{$livro->id}");
    }

    public function devolver(Livro $livro)
    {
        $livro->setStatus('Solicitado');
        return redirect("/livros/{$livro->id}");
    }
}
