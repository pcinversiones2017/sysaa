<?php

namespace App\Providers;

use App\Models\Desarrollo;
use App\Models\Procedimiento;
use App\Policies\DesarrolloPolicy;
use App\Policies\ProcedimientoPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Procedimiento::class => ProcedimientoPolicy::class,
        Desarrollo::class => DesarrolloPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
