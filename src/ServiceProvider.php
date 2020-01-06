<?php
declare(strict_types=1);

namespace LaravelModelMasker;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    private $configPath = __DIR__ . '/../config/model-masker.php';
    
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom($this->configPath, 'model-masker');
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([$this->configPath => $this->getConfigPath()], 'config');
    }

    /**
     * Get the config path
     *
     * @return string
     */
    protected function getConfigPath(): string
    {
        return config_path('model-masker.php');
    }
}
