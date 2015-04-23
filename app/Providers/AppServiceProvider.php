<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        $bindings = [
            'Illuminate\Contracts\Auth\Registrar' => 'App\Services\Registrar',
            'App\Repositories\VehiclesRepositoryInterface' => 'App\Repositories\VehiclesDBRepository',
            'App\Repositories\MaintenanceTypesRepositoryInterface' => 'App\Repositories\MaintenanceTypesDBRepository'
        ];

        foreach ($bindings as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
