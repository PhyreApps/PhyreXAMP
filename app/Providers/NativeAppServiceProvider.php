<?php

namespace App\Providers;


use Native\Laravel\Contracts\ProvidesPhpIni;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {

        MenuBar::create()
            ->onlyShowContextMenu()
            ->withContextMenu(
                Menu::new()
                    ->label('PhyreXAMP')
                    ->separator()
                    ->link('/restart-apache', 'Restart Apache')
                    ->link('/restart-mysql', 'Restart MySQL')
                    ->separator()
                    ->quit()
            );

//        Notification::title('Hello from PhyreXAMP!')
//            ->message('Welcome to PhyreXAMP, the best PHP development environment!')
//            ->show();

        Window::open()
          //  ->showDevTools(false)
            ->width(1200)
            ->height(800);
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [

        ];
    }
}
