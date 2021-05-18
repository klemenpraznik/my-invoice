<?php

namespace App\Providers;
use \App\Models\Category;
use \App\Models\Client;
use \App\Models\Product;
use \App\Models\Invoice;
use \App\Policies\CategoriesPolicy;
use \App\Policies\ClientsPolicy;
use \App\Policies\ProductPolicy;
use \App\Policies\InvoicePolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Category::class => CategoriesPolicy::class,
        Client::class => ClientsPolicy::class,
        Product::class => ProductPolicy::class,
        Invoice::class => InvoicePolicy::class,
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
