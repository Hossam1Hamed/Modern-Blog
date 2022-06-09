<?php

namespace App\Providers;

use App\Http\Interfaces\RepoInterface;
use App\Repositories\PostRepository;
use App\Repositories\CommentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RepoInterface::class,PostRepository::class);
        $this->app->bind(RepoInterface::class,CommentRepository::class);
    }

    public function boot()
    {
        //
    }
}
