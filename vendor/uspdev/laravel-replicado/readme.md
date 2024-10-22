# Wrapper do Uspdev\Replicado para uso com laravel

Este projeto cria um arquivo de configuração para o replicado de forma 

## Instalação e configuração

    composer require uspdev/laravel-replicado

Use conforme a documentação do replicado.

### Configuração padrão do `.env.example`

```sh
# LARAVEL-REPLICADO #########################################
# https://github.com/uspdev/laravel-replicado
# https://github.com/uspdev/replicado

REPLICADO_HOST=
REPLICADO_PORT=
REPLICADO_DATABASE=
REPLICADO_USERNAME=
REPLICADO_PASSWORD=

# Código da unidade
REPLICADO_CODUNDCLG=

# Todos os códigos de colegiados da unidade, separados por vírgula
REPLICADO_CODUNDCLGS=${REPLICADO_CODUNDCLG}

# Caminho do log (default=base_path('storage/logs/replicado.log'))
#REPLICADO_PATHLOG=

# Converte de/para UTF-8 (default=true)
#REPLICADO_SYBASE=

# habilita o uso do cache https://github.com/uspdev/cache (default=false)
# É necessário configurar a biblioteca antes de usar
#REPLICADO_USAR_CACHE=

# Tempo de expiração do cache (default=-1 -> default da biblioteca=1440 (s))
#REPLICADO_CACHE_EXPIRY=

# Tamanho mínimo para cachear (default=-1 -> default da bibloteca=32 (bytes))
#REPLICADO_CACHE_SMALL=

# Se true mostra o retorno de erros do BD (default=APP_DEBUG)
#REPLICADO_DEBUG=

# Nível de detalhes a ser feito log: 1 = somente erros (default), 2 = gera log das queries executadas
#REPLICADO_DEBUG_LEVEL=

```

A explicação de cada variável está no projeto [Uspdev\\Replicado](https://github.com/uspdev/replicado).
