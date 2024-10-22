
<?php

return [
    'host' => env('REPLICADO_HOST'),
    'port' => env('REPLICADO_PORT'),
    'database' => env('REPLICADO_DATABASE'),
    'username' => env('REPLICADO_USERNAME'),
    'password' => env('REPLICADO_PASSWORD'),
    'codundclg' => env('REPLICADO_CODUNDCLG'),
    'codundclgs' => env('REPLICADO_CODUNDCLGS'),
    'pathlog' => env('REPLICADO_PATHLOG', base_path('storage/logs/replicado.log')),
    'sybase' => (bool) env('REPLICADO_SYBASE', true),
    'usarCache' => (bool) env('REPLICADO_USAR_CACHE', false),
    'cacheExpiry' => (int) env('REPLICADO_CACHE_EXPIRY', -1),
    'cacheSmall' => (int) env('REPLICADO_CACHE_SMALL', -1),
    'debug' => (bool) env('REPLICADO_DEBUG', config('app.debug')),
    'debugLevel' => (int) env('REPLICADO_DEBUG_LEVEL', 1),
];
