<?php

namespace App\Console\Commands;

use App\Models\Service;
use Illuminate\Console\Command;

class GenerateServiceSlugs extends Command
{
    protected $signature = 'services:generate-slugs {--force : Overwrite existing transform_url values} {--dry-run : Show changes without writing}';

    protected $description = 'Generate and fill service transform_url (slug) using transliteration for services without slug';

    public function handle(): int
    {
        $overwrite = (bool) $this->option('force');
        $dryRun = (bool) $this->option('dry-run');

        $updated = 0;
        $skipped = 0;
        $total = 0;

        $query = Service::query()->orderBy('id');

        if (!$overwrite) {
            $query->where(function ($q) {
                $q->whereNull('transform_url')
                  ->orWhere('transform_url', '');
            });
        }

        $this->info('Пошук послуг без слагу...');

        $query->chunk(200, function ($services) use (&$updated, &$skipped, &$total, $overwrite, $dryRun) {
            foreach ($services as $service) {
                $total++;

                if (!$overwrite && !empty($service->transform_url)) {
                    $skipped++;
                    continue;
                }

                if (empty($service->name)) {
                    $this->warn("Послуга #{$service->id} не має назви, пропускаю...");
                    $skipped++;
                    continue;
                }

                $newSlug = Service::generateHref($service->name);

                if ($dryRun) {
                    $this->line("#{$service->id} '{$service->name}' => '{$newSlug}'" . (!empty($service->transform_url) ? " (було '{$service->transform_url}')" : ''));
                    $updated++;
                } else {
                    $service->transform_url = $newSlug;
                    $service->save();
                    $updated++;
                }
            }
        });

        $this->info("Оброблено: {$total} послуг");
        $this->info(($dryRun ? 'Буде оновлено' : 'Оновлено') . ": {$updated} записів");
        if ($skipped > 0) {
            $this->info("Пропущено: {$skipped} записів");
        }

        return Command::SUCCESS;
    }
}

