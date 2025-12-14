<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

// Bootstrap Laravel
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

try {
    $columns = DB::select('DESCRIBE temu_dokter');
    foreach ($columns as $col) {
        echo $col->Field . " | " . $col->Type . "\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
