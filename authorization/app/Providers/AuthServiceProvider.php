<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Student;
use App\Policies\StudentPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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
        $this->registerPolicies();
        Gate::define('view-student', [StudentPolicy::class, 'view']);
        Gate::define('create-student', [StudentPolicy::class, 'create']);
        Gate::define('update-student', [StudentPolicy::class, 'update']);
        Gate::define('delete-student', [StudentPolicy::class, 'delete']);
        Gate::define('restore-student', [StudentPolicy::class, 'restore']);
        Gate::define('force-delete-student', [StudentPolicy::class, 'forceDelete']);


    }
}
