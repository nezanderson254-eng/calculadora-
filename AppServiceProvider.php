<?php
namespace App\Providers;

use App\Services\CalculadoraService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Ejemplo de Contenedor de Servicios: Laravel inyecta esta clase automáticamente.
        $this->app->bind(CalculadoraService::class, fn () => new CalculadoraService());
    }

    public function boot(): void
    {
        //
    }
}
