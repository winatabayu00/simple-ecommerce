<?php

namespace App\Http\Routes;

use Dentro\Yalr\BaseRoute;

class DefaultRoute extends BaseRoute
{
    protected string $prefix = '';

    protected string $name = '';
    /**
     * Register routes handled by this class.
     *
     * @return void
     */
    public function register(): void
    {
        $this->router->get('/', function () {
            return view('pages.app.home');
        });
    }

    public function afterRegister(): void
    {
        $this->sidebarTab();
    }

    protected function sidebarTab()
    {
        menus()
            ->setGroup(
                name: 'dashboard',
                group: 'dashboard',
                icon: 'ki-outline ki-home-2 fs-2',
                menus: function ($menu) {
                    return $menu->addMenu(
                        title: __('Dashboard'),
                        icon: 'ki-book-open',
                        routeName: 'admin.dashboard.index',
                        activeRouteName: 'admin.dashboard.index',
                    );
                }
            )->setGroup(
                name: 'product',
                group: 'product',
                icon: 'ki-outline ki-home-2 fs-2',
                menus: function ($menu) {
                    return $menu->addMenu(
                        title: __('Products'),
                        icon: 'ki-book-open',
                        routeName: 'admin.products.index',
                        activeRouteName: 'admin.products*',
                    );
                }
            )->setGroup(
                name: 'order',
                group: 'order',
                icon: 'ki-outline ki-home-2 fs-2',
                menus: function ($menu) {
                    return $menu->addMenu(
                        title: __('Order Listing'),
                        icon: 'ki-book-open',
                        routeName: 'admin.orders.index',
                        activeRouteName: 'admin.orders*',
                    );
                }
            )->setGroup(
                name: 'user',
                group: 'user',
                icon: 'ki-outline ki-home-2 fs-2',
                menus: function ($menu) {
                    return $menu->addMenu(
                        title: __('Customers'),
                        icon: 'ki-book-open',
                        routeName: 'admin.users.index',
                        activeRouteName: 'admin.users*',
                    );
                }
            );
    }
}
