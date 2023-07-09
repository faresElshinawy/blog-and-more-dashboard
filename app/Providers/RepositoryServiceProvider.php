<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $models = [
            'Gender',
            'Country',
            'Department',
            'User',
            'Client',
            'Feature',
            'Contact',
            'Plan',
            'PostCategory',
            'Tag',
            'Post',
            'Login',
            'PostTag',
            'Question',
            'Service',
            'Setting',
            'ProjectCategory',
            'Project',
            'ProjectImage',
            'ProjectTeam',
            'Feedback',
            'Statistics'
        ];
        foreach ($models as $model)
        {
            $this->app->bind("App\Interfaces\\{$model}RepositoryInterface","App\Repositories\\{$model}Repository");
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

    }
}
