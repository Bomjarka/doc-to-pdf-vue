<?php

namespace App\Providers;

use Bomjarka\WordToPdfConverter\Services\Converter\ConverterInterface;
use Bomjarka\WordToPdfConverter\Services\Converter\PDFConverter;
use Bomjarka\WordToPdfConverter\Services\Repository\FileSystemRepository;
use Bomjarka\WordToPdfConverter\Services\Repository\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ConverterInterface::class, PDFConverter::class);
        $this->app->bind(RepositoryInterface::class, FileSystemRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
