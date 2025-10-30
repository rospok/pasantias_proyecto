<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeCrudView extends Command
{
    protected $signature = 'make:crud-view {entity}';
    protected $description = 'Crea vistas CRUD basadas en una plantilla';

    public function handle()
    {
        $entity = $this->argument('entity');
        $stub = resource_path('stubs/crud-view.stub');
        
        if (!File::exists($stub)) {
            $this->error('Plantilla stub no encontrada!');
            return;
        }
        
        $replacements = [
            '{{Entity}}' => Str::studly($entity),
            '{{entity}}' => Str::snake($entity),
            '{{entities}}' => Str::plural(Str::snake($entity)),
            '{{Entities}}' => Str::plural(Str::studly($entity)),
        ];


        $stubprocess = File::get($stub);



        $viewContent = str_replace(
            array_keys($replacements),
            array_values($replacements),
            $stubprocess
        );

        $directory = resource_path("views/{$entity}");
        $filePath = "{$directory}/index.blade.php";

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        File::put($filePath, $viewContent);
        $this->info("Vista creada: {$filePath}");
    }
}