<?php

namespace Dpb\Packages\Utils\Providers;

use Illuminate\Support\Facades\Artisan;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UtilsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('pkg-utils')
            ->hasConfigFile()
            ->hasMigrations([
                '0001_create_utils_tables',
            ])
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishMigrations()
                    ->publishConfigFile()
                    ->askToRunMigrations()
                    ->endWith(function () {
                        Artisan::call('db:seed', [
                            '--class' => 'Dpb\\Packages\\Utils\\Database\\Seeders\\DatabaseSeeder',
                            '--force' => true,
                        ]);
                    });
            });
    }    
}
