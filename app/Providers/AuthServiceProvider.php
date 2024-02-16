<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('lista-documentos', function() {
            return ( Gate::allows('admin') || Gate::allows('comissao') );
        });

        Gate::define('empresa', function() {
            return ( Gate::allows('admin') || Gate::allows('empresa') );
        });
    }
}
