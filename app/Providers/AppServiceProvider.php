<?php

namespace App\Providers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('update-post', function (User $user, Posts $post) {
            // Admin bisa mengedit semua post, user biasa hanya post miliknya
            return $user->role === 'admin' || $user->id === $post->user_id;
        });
    
        Gate::define('delete-post', function (User $user, Posts $post) {
            // Admin bisa menghapus semua post, user biasa hanya post miliknya
            return $user->role === 'admin' || $user->id === $post->user_id;
        });
    }
}
