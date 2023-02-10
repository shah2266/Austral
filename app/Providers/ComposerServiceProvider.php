<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [
                'website.includes.header-menu',
                'website.pages.aus_inquire',
                'website.includes.recent-projects',
                'website.includes.recent-events',
                'website.includes.footer'
            ],
            'App\Http\View\Composers\ViewComposer'
        );
		
		View::composer(
            [
                'admin.includes.header-menu'
            ],
            'App\Http\View\Composers\InquireComposer'
        );
    }
}
