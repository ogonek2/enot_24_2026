<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Icon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImportIcons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'icons:import {--path=src/icons_svg}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import existing icons from storage to database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = $this->option('path');
        $fullPath = storage_path('app/public/' . $path);
        
        if (!is_dir($fullPath)) {
            $this->error("Directory not found: {$fullPath}");
            return 1;
        }

        $this->info("Scanning directory: {$fullPath}");
        
        $files = glob($fullPath . '/*.{svg,png,jpg,jpeg}', GLOB_BRACE);
        $imported = 0;
        $skipped = 0;
        $errors = 0;

        foreach ($files as $file) {
            $relativePath = str_replace(storage_path('app/public/'), '', $file);
            $fileName = basename($file);
            
            // Проверяем, не существует ли уже такая иконка
            $existing = Icon::where('file_path', $relativePath)->first();
            if ($existing) {
                $this->warn("Skipping (already exists): {$fileName}");
                $skipped++;
                continue;
            }

            try {
                $mimeType = mime_content_type($file);
                $fileSize = filesize($file);
                
                // Генерируем имя из имени файла (убираем расширение и форматируем)
                $name = pathinfo($fileName, PATHINFO_FILENAME);
                $name = str_replace(['-', '_'], ' ', $name);
                $name = ucwords($name);
                
                Icon::create([
                    'name' => $name,
                    'file_path' => $relativePath,
                    'file_name' => $fileName,
                    'mime_type' => $mimeType,
                    'file_size' => $fileSize,
                ]);

                $this->info("Imported: {$fileName}");
                $imported++;
            } catch (\Exception $e) {
                $this->error("Error importing {$fileName}: " . $e->getMessage());
                $errors++;
            }
        }

        $this->newLine();
        $this->info("Import completed!");
        $this->info("Imported: {$imported}");
        $this->info("Skipped: {$skipped}");
        if ($errors > 0) {
            $this->warn("Errors: {$errors}");
        }

        return 0;
    }
}
