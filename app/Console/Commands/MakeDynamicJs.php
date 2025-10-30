<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeDynamicJs extends Command
{
    protected $signature = 'make:js-base {entity}';
    protected $description = 'Crea archivos JS para entidades con estructura predefinida';

    public function handle()
    {
        $entity = $this->argument('entity');
        $stubPath =  __DIR__ . '\stubs\dynamic-js.stub';
        
        if (!File::exists($stubPath)) {
            $this->error('Plantilla stub no encontrada!');
            return;
        }

        $jsContent = File::get($stubPath);
        
        // Reemplazar placeholders
        $replacements = [
            '{{entity}}' => $entity,
            '{{Entity}}' => Str::studly($entity),
            '{{entities}}' => Str::plural($entity),
            '{{Entities}}' => Str::plural(Str::studly($entity)),
        ];

        $jsContent = str_replace(
            array_keys($replacements),
            array_values($replacements),
            $jsContent
        );

        $directory = public_path("backend/js");
        $filePath = "{$directory}/{$entity}.js";

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        File::put($filePath, $jsContent);
        $this->info("Archivo JS creado: {$filePath}");
    }
}