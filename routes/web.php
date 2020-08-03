<?php

use NPDashboard\Http\Middleware\AuthenticateMiddleware;
use NPDashboard\Http\Middleware\RedirectIfAuthenticated;

$authMiddleware = new AuthenticateMiddleware();
$authRedirectMiddleware = new RedirectIfAuthenticated();

/**
 * Auth needed routes:
 */
$router->group('', function (){
    $this->get('/', 'PagesController@home')->setName('home');

    $this->get('/debugger', function(){
        return view('pages.stats.debugger');
    });


    /**
     * Coupons
     */
    $this->group('/coupons', function(){
        $this->get('','CouponsController@all')->setName('coupons.all');
        $this->get('/generate','CouponsController@generateCoupons')->setName('coupons.generate');
        $this->post('/generated','CouponsController@generatedCoupons')->setName('coupons.generated-coupons');
        $this->post('/search', 'CouponsController@search')->setName('coupons.search');
        $this->get('/{value}/search/{method}', 'CouponsController@searchResult')->setName('coupons.search-result');
        $this->group('/{id}', function (){
            $this->get('/enable','CouponsController@enableCoupon')->setName('coupons.enable-coupon');
            $this->get('/disable','CouponsController@disableCoupon')->setName('coupons.disable-coupon');
            $this->get('/customer', 'CouponsController@searchUserCoupons')->setName('coupons.find-user');
        });
    });

    /**
     * Discount
     */
    $this->group('/discount', function(){
        $this->get('','DiscountsController@all')->setName('discount.all');
        $this->post('/store', 'DiscountsController@store')->setName('discount.store');
        $this->group('/{id}' ,function (){
            $this->get('/edit', 'DiscountsController@edit')->setName('discount.edit');
            $this->get('/delete', 'DiscountsController@delete')->setName('discount.delete');
            $this->post('/update', 'DiscountsController@update')->setName('discount.update');
        });
    });

    /**
     * Email
     */
    $this->group('/email', function (){
        $this->get('', 'EmailController@showMailPage')->setName('email.page');
        $this->get('/customer/{customer_id}', 'EmailController@showMailPage')->setName('email.page');
        $this->post('/send', 'EmailController@sendMail')->setName('email.send');
    });

    /**
     * Games
     */
    $this->group('/games', function (){
        $this->get('','GamesController@all')->setName('games.all');
        $this->get('/create','GamesController@create')->setName('games.create');
        $this->post('/store', 'GamesController@store')->setName('games.store');
        $this->post('/delete-cover', 'GamesController@deleteCover')->setName('games.delete-cover');
        $this->group('/{id}', function (){
            $this->get('/edit', 'GamesController@edit')->setName('games.edit');
            $this->get('/update-cover', 'GamesController@updateCoverStatus')->setName('games.update-cover');
            $this->get('/update-page-access', 'GamesController@updatePageAccessStatus')->setName('games.update-page-access');
            $this->post('/update', 'GamesController@update')->setName('games.update');
        });
    });

    /**
     * Groups
     */
    $this->group('/groups', function(){
        $this->get('', 'GroupsController@all')->setName('groups.all');
        $this->post('/create', 'GroupsController@create')->setName('groups.create');
        $this->group('/{id}', function (){
            $this->get('/edit', 'GroupsController@edit')->setName('groups.edit');
            $this->post('/update', 'GroupsController@update')->setName('groups.update');
        });
    });


    /**
     * Reports
     */
    $this->group('/reports', function() {
        $this->get('/vip-customers', 'ReportsController@vipCustomers')->setName('reports.vip-customers');
    });


    /**
     * Site
     */
    $this->group('/site', function (){
        /**
         * Faqs Site
         */
        $this->group('/faqs', function() {
            $this->get('', 'FaqsController@all')->setName('site.faqs');
            $this->post('/store', 'FaqsController@store')->setName('site.faqs-store');
            $this->get('/create', 'FaqsController@create')->setName('site.faqs-create');
            $this->group('/{id}', function (){
                $this->get('/edit', 'FaqsController@edit')->setName('site.faqs-edit');
                $this->get('/delete', 'FaqsController@delete')->setName('site.faqs-delete');
                $this->post('/update', 'FaqsController@update')->setName('site.faqs-update');
                $this->post('/update-order', 'FaqsController@updateOrder')->setName('site.faqs-update-order');
            });
        });
        /**
         * Site Maps.
         */
        $this->group('/sitemaps', function() {
            $this->get('', 'SitemapsController@all')->setName('site.sitemaps.all');
            $this->post('/store', 'SitemapsController@store')->setName('site.sitemaps.store');
            $this->get('/create', 'SitemapsController@create')->setName('site.sitemaps.create');
            $this->group('/{id}', function (){
                $this->get('/edit', 'SitemapsController@edit')->setName('site.sitemaps.edit');
                $this->get('/delete', 'SitemapsController@delete')->setName('site.sitemaps.delete');
                $this->post('/update', 'SitemapsController@update')->setName('site.sitemaps.update');
            });
        });
    });

    /**
     * Stats
     */
    $this->group('/stats', function (){
        $this->get('/charts-general', 'StatsController@general')->setName('stats.general');
    });
    
    /**
     * Testimonials
     */
    $this->group('/testimonials', function(){
        $this->get('','TestimonialsController@all')->setName('testimonials');
        $this->get('/pending', 'TestimonialsController@pending')->setName('testimonials.pending');
        $this->get('/approved', 'TestimonialsController@approved')->setName('testimonials.approved');
        $this->get('/disapproved', 'TestimonialsController@disapproved')->setName('testimonials.disapproved');
        $this->post('/update-status', 'TestimonialsController@updateStatus')->setName('testimonials.update-status');
        $this->post('/update-language', 'TestimonialsController@updateLanguage')->setName('testimonials.update-language');
        $this->post('/update-landing', 'TestimonialsController@updateStatusLandingPage')->setName('testimonials.update-landing');
        $this->group('/search', function(){
            $this->post('', 'TestimonialsController@search')->setName('testimonials.search');
            $this->get('/result/{method}/{value}', 'TestimonialsController@searchResult')->setName('testimonials.search.result');
        });
        $this->group('/fake', function(){
            $this->get('/all', 'TestimonialsController@fakeAll')->setName('testimonials.fakes-all');
            $this->get('/create', 'TestimonialsController@fakeCreate')->setName('testimonials.fake-create');
            $this->post('/store', 'TestimonialsController@fakeStore')->setName('testimonials.fake-store');
            $this->get('/schedule', 'TestimonialsController@fakeSchedules')->setName('testimonials.fake-schedules');
            $this->get('/schedule/{id}/delete', 'TestimonialsController@deleteSchedule')->setName('testimonials.fake-delete-schedule');
        });
    });

    /**
     * Users
     */
    $this->group('/users', function(){
        $this->get('','UsersController@all')->setName('users.all');
        $this->post('/store', 'UsersController@store')->setName('users.store');
        $this->get('/create', 'UsersController@create')->setName('users.create');
        $this->group('/{id}', function (){
            $this->get('/edit', 'UsersController@edit')->setName('users.edit');
            $this->post('update', 'UsersController@update')->setName('users.update');
            $this->get('/edit/roles', 'UsersController@editRoles')->setName('users.edit-roles');
            $this->post('/update/roles', 'UsersController@updateRoles')->setName('users.update-roles');
        });
    });
   

})->add($authMiddleware);

/**
 * Not authenticated routes
 */
$router->group('/auth', function(){
    $this->get('/login', 'AuthController@login')->setName('auth.login');
    $this->post('/login', 'AuthController@authenticate')->setName('auth.authenticate');

})->add($authRedirectMiddleware);

$router->get('/auth/logout', 'AuthController@logout')->setName('auth.logout');