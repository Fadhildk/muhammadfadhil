<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

try {
    $pdo = DB::connection()->getPdo();
    echo "Database connection successful!\n";

    // Test if users table exists
    $tables = DB::select('SHOW TABLES');
    echo "Tables in database:\n";
    foreach ($tables as $table) {
        echo "- " . reset($table) . "\n";
    }

    // Test if we can query users table
    $users = DB::table('users')->count();
    echo "Users count: $users\n";

} catch (\Exception $e) {
    echo "Database connection failed: " . $e->getMessage() . "\n";
}
