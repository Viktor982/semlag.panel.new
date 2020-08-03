<?php

namespace NPDashboard\Http\Controllers;

use NPCore\Http\Redirect;
use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Services\AdministrativeAuthService;

class AuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('pages.auth.login');
    }

    /**
     * @param AdministrativeAuthService $service
     * @return Redirect
     */
    public function authenticate(AdministrativeAuthService $service)
    {
        $args = $this->request->all();

        /*if (!$this->validateCaptcha()) {
            $loginRoute = route('auth.login');
            $redirect = (isset($args['redirect'])) ? $loginRoute . '?redirect=' . $args['redirect'] : $loginRoute;
            return redirect()->to($redirect);
        }*/

        $attempt = $service->attempt($args['username'], $args['password']);

        if (!$attempt) {
            // $loginRoute = route('auth.login');
            // $redirect = (isset($args['redirect'])) ? $loginRoute . '?redirect=' . $args['redirect'] : $loginRoute;
            return redirect('auth.login');
        }

        // $redirect = (isset($args['redirect'])) ? $args['redirect'] : route('home');
        np_log('login');
        return redirect('home');
    }

    /**
     * @param AdministrativeAuthService $service
     * @return \NPCore\Http\Redirect
     */
    public function logout(AdministrativeAuthService $service)
    {
        $service->deauthenticate();
        return redirect('auth.login');
    }
}