<?php

namespace App\Console\Commands;

use App\Models\Service;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class BackfillServiceCategoryPivot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:backfill-service-category {--dry-run : Show what would be inserted without writing}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy services.category_id values into category_service pivot table without changing schema';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');

        $rowsProcessed = 0;
        $rowsInserted = 0;

        Service::query()
            ->select(['id', 'category_id'])
            ->whereNotNull('category_id')
            ->orderBy('id')
            ->chunk(500, function ($services) use (&$rowsProcessed, &$rowsInserted, $dryRun) {
                $now = now();
                $batch = [];

                foreach ($services as $service) {
                    $rowsProcessed++;

                    $exists = DB::table('category_service')
                        ->where('service_id', $service->id)
                        ->where('category_id', $service->category_id)
                        ->exists();

                    if ($exists) {
                        continue;
                    }

                    $batch[] = [
                        'category_id' => $service->category_id,
                        'service_id' => $service->id,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ];
                }

                if (!empty($batch)) {
                    if ($dryRun) {
                        $rowsInserted += count($batch);
                    } else {
                        $rowsInserted += DB::table('category_service')->insert($batch) ? count($batch) : 0;
                    }
                }
            });

        $this->info("Processed: {$rowsProcessed} services");
        $this->info(($dryRun ? 'Would insert' : 'Inserted') . ": {$rowsInserted} pivot rows");

        return Command::SUCCESS;
    }
}


