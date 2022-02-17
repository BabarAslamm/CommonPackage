<?php

namespace Insyghts\Common\Services;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

class CommonServiceProvider extends ServiceProvider
{
    /**
     * @throws BindingResolutionException
     */
    public function register()
    {
        $this->app->make('Insyghts\Common\Controllers\CommonController');
    }

    public function boot()
    {
        //
    }
}
