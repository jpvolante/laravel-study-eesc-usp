<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Livro;

class FileController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Log de chamada do método para verificar dados recebidos
        Log::info('Método store chamado', ['request' => $request->all()]);

        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'file' => 'required|file|image|mimes:jpeg,png|max:2048',
            'livro_id' => 'required|integer|exists:livros,id'
        ]);

        try {
            // Criar diretório se não existir
            $directoryPath = storage_path('app/private/uploads');
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0775, true);
            }

            // Definir permissões do diretório
            chmod($directoryPath, 0775);

            // Armazenar o arquivo no diretório especificado
            $filePath = $request->file('file')->store('private/uploads', 'local'); // Armazenando na pasta private

            // Salvar informações no banco de dados
            $livro = Livro::find($validatedData['livro_id']);
            $livro->caminho_arquivo = $filePath; // Adicionando o caminho do arquivo ao livro
            $livro->save();

            // Gera a URL para acessar o arquivo
            $fileUrl = route('files.show', ['file' => basename($filePath)]); // Chama a rota para mostrar o arquivo

            return redirect()->route('livros.show', $livro->id)->with('file_url', $fileUrl);
        } catch (\Exception $e) {
            // Logar o erro
            Log::error('Erro ao enviar arquivo', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Ocorreu um erro ao enviar o arquivo: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified file.
     */
    public function show($file)
    {
        // Verifica se o arquivo existe
        $path = storage_path('app/private/uploads/' . $file);
        if (!file_exists($path)) {
            abort(404); // Retorna erro 404 se o arquivo não existir
        }

        // Retorna o arquivo como resposta
        return response()->file($path);
    }
}
