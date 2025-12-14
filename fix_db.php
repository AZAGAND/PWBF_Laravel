<?php

use Illuminate\Support\Facades\DB;

require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());

try {
    DB::statement("ALTER TABLE temu_dokter MODIFY COLUMN status VARCHAR(50) DEFAULT 'Pending'");
    echo "Success: Column status modified to VARCHAR(50).\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
