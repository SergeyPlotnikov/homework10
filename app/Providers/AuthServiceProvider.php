<?php

namespace App\Providers;

use App\Entity\Currency;
use App\Policies\CurrencyPolicy;
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
        Currency::class => CurrencyPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('currencies', 'App\Policies\CurrencyPolicy', [
            'create' => 'create',
            'edit' => 'edit',
            'store' => 'store',
            'show-add-button' => 'showAddButton',
            'update'=>'update',
            'show-change-button'=>'showChangeButton'
        ]);
    }
}
