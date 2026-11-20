<?php
use Illuminate\Support\Facades\Artisan;

Artisan::command('calculadora:ayuda', function () {
    $this->info('Abre / para usar la calculadora.');
})->purpose('Muestra una ayuda de la calculadora');
