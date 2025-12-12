<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;
use App\Models\Task;
use App\Models\User;
use App\Models\Order;
use App\Models\Finance;
use App\Models\Project;
use App\Models\Customer;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected $policies = [
        User::class => UserPolicy::class,
        Customer::class => CustomerPolicy::class,
        Finance::class => FinancePolicy::class,
        Project::class => ProjectPolicy::class,
        Task::class => TaskPolicy::class,
        Order::class => OrderPolicy::class
    ];
    public function register(): void
    {
        $this->registerPolicies();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
