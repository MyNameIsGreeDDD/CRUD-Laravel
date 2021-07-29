<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\Access\Response;
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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-delete-product', function (User $user, Product $product) {
            if ($user->id === $product->user_id) {
                return Response::allow();
            }
            return Response::deny('Нельзя редактировать или удалять чужой товар');
        });
        Gate::define('is-seller', function (User $user) {
            if ($user->role === 'Продавец') {
                return Response::allow();
            }
            return Response::deny('Нельзя добавлять товары не имея статуса продовца');
        });
        Gate::define('not-seller', function (User $user) {
            if ($user->role !== 'Продавец') {
                return Response::allow();
            }
            return Response::deny('Нельзя стать продавцом, если вы им уже являетесь');
        });


    }
}
