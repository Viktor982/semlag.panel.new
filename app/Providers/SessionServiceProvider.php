<?php

namespace NPDashboard\Providers;

use NPCore\Hooks\Container;
use NPCore\Providers\Provider;
use NPCore\Session\Session;
use Auryn\Injector;
use NPCore\Session\SessionStore;

class SessionServiceProvider extends Provider
{
    /**
     * @param Container $container
     */
    public function boot(Container $container)
    {
        $sessionStore = new SessionStore();
        $session = new Session($sessionStore);
        $session->boot();
        if($user = $session->get('user')) {
            $container['roles'] = $user->roles();
        }
        $container['session'] = $session;
    }
}