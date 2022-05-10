<?php

namespace JonasPardon\Mermaid;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use JonasPardon\Mermaid\Commands\MermaidCommand;

class MermaidServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('mermaid-php')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_mermaid-php_table')
            ->hasCommand(MermaidCommand::class);
    }
}
