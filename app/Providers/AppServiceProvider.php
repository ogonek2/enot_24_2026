<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Register @vite directive for Laravel 8 with HMR support
        Blade::directive('vite', function ($expression) {
            return "<?php
                \$manifestPath = public_path('build/manifest.json');
                \$devServer = config('app.env') === 'local' ? 'http://localhost:5173' : null;
                
                if (\$devServer && !file_exists(\$manifestPath)) {
                    // Development mode - use Vite dev server
                    echo '<script type=\"module\" src=\"' . \$devServer . '/@vite/client\"></script>' . PHP_EOL;
                    \$assets = {$expression};
                    if (is_array(\$assets)) {
                        foreach (\$assets as \$asset) {
                            echo '<script type=\"module\" src=\"' . \$devServer . '/' . \$asset . '\"></script>' . PHP_EOL;
                        }
                    }
                } elseif (file_exists(\$manifestPath)) {
                    // Production mode - use manifest
                    \$manifest = json_decode(file_get_contents(\$manifestPath), true);
                    if (\$manifest) {
                        \$assets = {$expression};
                        if (is_array(\$assets)) {
                            foreach (\$assets as \$asset) {
                                if (isset(\$manifest[\$asset]['file'])) {
                                    echo '<link rel=\"stylesheet\" href=\"' . asset('build/' . \$manifest[\$asset]['file']) . '\">' . PHP_EOL;
                                }
                            }
                        }
                    }
                }
            ?>";
        });
    }
}
