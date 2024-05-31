<?php

namespace App\Providers;

use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Photos\PhotoRepository;
use App\Repositories\Photos\PhotoRepositoryInterface;
use App\Repositories\Posts\PostRepository;
use App\Repositories\Posts\PostRepositoryInterface;
use App\Repositories\ProductChapters\ProductChapterRepository;
use App\Repositories\ProductChapters\ProductChapterRepositoryInterface;
use App\Repositories\Products\ProductRepository;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\ProductUserLibraries\ProductUserLibraryRepository;
use App\Repositories\ProductUserLibraries\ProductUserLibraryRepositoryInterface;
use App\Repositories\Settings\SettingRepository;
use App\Repositories\Settings\SettingRepositoryInterface;
use App\Repositories\Users\UserRepository;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(PhotoRepositoryInterface::class, PhotoRepository::class);
        $this->app->bind(ProductChapterRepositoryInterface::class, ProductChapterRepository::class);
        $this->app->bind(ProductUserLibraryRepositoryInterface::class, ProductUserLibraryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
