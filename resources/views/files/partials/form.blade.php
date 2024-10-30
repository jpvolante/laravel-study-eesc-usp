<form method="post" enctype="multipart/form-data" action="{{ route('files.store') }}">
    @csrf
    <input type="hidden" name="livro_id" value="{{ $livro->id }}">
    
    <div class="form-group">
        <label for="file">Escolha uma imagem:</label>
        <input type="file" name="file" id="file" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Enviar</button>
</form>

<!-- Se desejar, adicione um local para exibir mensagens -->
<div id="message" class="mt-3"></div>

<!-- Adicione um script para manipular a resposta do formulário -->
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest', // Para indicar que é uma requisição Ajax
            },
        })
        .then(response => response.json())
        .then(data => {
            const messageDiv = document.getElementById('message');
            if (data.message) {
                messageDiv.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
            }
            if (data.file_url) {
                messageDiv.innerHTML += `<img src="${data.file_url}" alt="Imagem enviada" class="img-thumbnail mt-2">`;
            }
        })
        .catch(error => {
            const messageDiv = document.getElementById('message');
            messageDiv.innerHTML = `<div class="alert alert-danger">Ocorreu um erro ao enviar o arquivo.</div>`;
        });
    });
</script>

