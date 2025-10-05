<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;

class SetCategoryDiscount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:set-discount {category_id} {percent}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set discount for a category';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $categoryId = $this->argument('category_id');
        $percent = $this->argument('percent');

        $category = Category::find($categoryId);
        
        if (!$category) {
            $this->error("Category with ID {$categoryId} not found.");
            return 1;
        }

        $category->update([
            'discount_active' => true,
            'discount_percent' => $percent
        ]);

        $this->info("Discount {$percent}% set for category: {$category->name}");
        return 0;
    }
}
