<?php

namespace App\Providers\ViewComposers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->highlightSidebarMenu();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Load 'menu' variable into all views to highlights sidebar menu entry.
     *
     * @return view Current view with 'menu' variable
     */
    private function highlightSidebarMenu()
    {
        view()->composer(['admin.*'], function ($view) {
            $section = explode('.', $view->getName());

            switch ($section[0]) {
                case 'dashboard':
                    $menu = 'dashboard';
                    break;
                case 'admin':
                    $menu = $section[1];
                    break;

                default:
                    dd('Check settings in ViewComposers/ComposerServiceProvider.php: ' . $view->getName());
                    break;
            }
            $view->with('menu', $menu);
        });
    }
}
