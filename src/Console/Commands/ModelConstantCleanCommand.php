<?php

namespace MennoVanHout\LaravelModelConstants\Console\Commands;

use File;
use MennoVanHout\LaravelModelConstants\Types\ModelAttributes;
use ReflectionClass;

class ModelConstantCleanCommand extends ModelConstantCommand
{
    protected $signature = 'model:constants-clean';
    protected $description = 'Delete files generated by the laravel-model-constants package.';

    public function handle(): void
    {
        $files = $this->findAllFilesWithClass(ModelAttributes::class);

        foreach ($files as $file) {
            $this->info("Deleting file: {$file}");

            $reflection = new ReflectionClass($file);

            File::delete($reflection->getFileName());
        }
    }
}
