<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class BackfillCategoryHref extends Command
{
    protected $signature = 'data:backfill-category-href {--force : Overwrite existing href values} {--dry-run : Show changes without writing}';

    protected $description = 'Generate and fill category href using transliteration (e.g., odyag-tekstil)';

    public function handle(): int
    {
        $overwrite = (bool) $this->option('force');
        $dryRun = (bool) $this->option('dry-run');

        $updated = 0;
        $total = 0;

        Category::query()
            ->select(['id', 'name', 'href'])
            ->orderBy('id')
            ->chunk(200, function ($categories) use (&$updated, &$total, $overwrite, $dryRun) {
                foreach ($categories as $category) {
                    $total++;

                    if (!$overwrite && !empty($category->href)) {
                        continue;
                    }

                    $newHref = Category::generateCategorySlug($category->name);

                    if ($dryRun) {
                        $this->line("#{$category->id} '{$category->name}' => '{$newHref}'" . (!empty($category->href) ? " (was '{$category->href}')" : ''));
                        $updated++;
                    } else {
                        $category->href = $newHref;
                        $category->save();
                        $updated++;
                    }
                }
            });

        $this->info("Processed: {$total} categories");
        $this->info(($dryRun ? 'Would update' : 'Updated') . ": {$updated} rows");

        return Command::SUCCESS;
    }
}


