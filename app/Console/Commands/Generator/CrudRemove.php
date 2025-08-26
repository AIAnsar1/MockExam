<?php

namespace App\Console\Commands\Generator;

use Illuminate\Console\Command;

class CrudRemove extends Command
{
    /**
     * The CRUD Files of the console command.
     *
     * @var array
     */
    protected array $fileNames = [
        'app/Events/CrudGeneratorEvent',
        'app/Http/Controllers/CrudGeneratorController',
        'app/Http/Requests/StoreRequest/StoreCrudGeneratorRequest',
        'app/Http/Requests/UpdateRequest/UpdateCrudGeneratorRequest',
        'app/Http/Resources/CrudGeneratorResource',
        'app/Jobs/CrudGeneratorJob',
        'app/Listeners/CrudGeneratorListener',
        'app/Models/CrudGenerator',
        'app/Observers/CrudGeneratorObserver',
        'app/Repositories/CrudGeneratorRepository',
        'app/Services/CrudGeneratorService',
        'database/factories/CrudGeneratorFactory',
        'database/seeders/CrudGeneratorSeeder',
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generator:remove {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removing CRUD App With REST API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $testMethods = ['Index', 'Store', 'Show', 'Update', 'Delete'];
        $httpMethods = ['get', 'post', 'get', 'put', 'delete'];
        $pathX = $this->argument('name');

        foreach ($this->fileNames as $fileName) {
            $filePath = str_replace('CrudGenerator', $pathX, $fileName) . ".php";

            if (file_exists($filePath)) 
            {
                @unlink($filePath);
                $this->info("[ ETA ]: Removed $filePath");
            }

            foreach ($testMethods as $index => $methods) 
            {
                $testFileName = "tests/Feature/{$pathX}/" . ucfirst($httpMethods[$index]) . "{$pathX}{$methods}RequestTest.php";
                if (file_exists($testFileName)) 
                {
                    @unlink($testFileName);
                    $this->info("[ ETA ]: Removed $testFileName");
                }
            }
        }
        $this->deleteDirectory("tests/Feature/{$pathX}");
        $filamentResourceDir = app_path("Filament/Resources/{$pathX}s");
        if (is_dir($filamentResourceDir))
        {
            $this->deleteDirectory($filamentResourceDir);
            $this->info("[ ETA ]: Removed Filament Resource directory {$filamentResourceDir}");
        }

        foreach (glob(database_path("migrations/*_create_" . strtolower($pathX) . "s_table.php")) as $migrationFile)
        {
            @unlink($migrationFile);
            $this->info("[ ETA ]: Removed Migration " . basename($migrationFile));
        }
        $this->info("[ ETA ]: CRUD for {$pathX} removed successfully!");
    }

    private function deleteDirectory($dir)
    {
        if (!file_exists($dir)) 
        {
            return;
        }
        $files = array_diff(scandir($dir), ['.', '..']);

        foreach ($files as $file) 
        {
            $path = "$dir/$file";
            if (is_dir($path)) 
            {
                $this->deleteDirectory($path);
            } else {
                @unlink($path);
            }
        }
        rmdir($dir);
    }
}