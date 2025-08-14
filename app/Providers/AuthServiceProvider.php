<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
     protected $policies= [
        Post::class => PostPolicy::class,
     ];
    public function register(): void
    {
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
