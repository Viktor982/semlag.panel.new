<?php

$router->group('/api', function (){
    $this->group('/charts', function (){
        $this->post('/general', 'API\\ChartsController@general')->setName('api.charts.general');
    });
    $this->get('/servers', 'API\\ServersController@all');
    $this->post('/blog/categories/get-category', 'API\\CategoriesController@getCategory')->setName('api.blog.get-category');
    $this->post('/blog/tags/get-tags', 'API\\TagsController@getTag')->setName('api.blog.get-tag');

    $this->get('/server-alerts', 'API\\ServerAlertsController@byPeriod');
    $this->get('/server/{id}', 'API\\ServersController@byId');
    $this->post('/server/{id}/set-position', 'API\\ServersController@setPosition');
    $this->post('/update-servers-info', 'API\\ServersController@updateServersInfo')->setName('api.servers.update-servers-info'); // Need a hourly cron
    $this->post('/update-servers-ranking', 'API\\ServersController@updateServersRanking')->setName('api.servers.update-servers-ranking'); // Need a daily cron
    $this->get('/coupons/{id}', 'API\\CouponsController@getUserCoupons')->setName('api.coupons.get-user');
    $this->post('/coupons/change-status', 'API\\CouponsController@disableCoupon')->setName('api.coupons.change');
    $this->get('/npcoins/transactions/{id}', 'API\\NPCoinsTransactionsController@getTransactions')->setName('api.npcoins.transactions');
    
    $this->post('/npcoins/transactions/release-balance', 'API\\NPCoinsTransactionsController@releaseBalance')->setName('api.npcoins.release-balance');
    $this->post('/npcoins/transactions/release-balance-all', 'API\\NPCoinsTransactionsController@releaseBalanceAll')->setName('api.npcoins.release-balance-all');
    $this->get('/discount-coupons', 'API\\DiscountCoupons@getStats')->setName('api.discount.stats');
    $this->get('/debbuger/customer/{id}', 'API\\DebuggerController@customer')->setName('api.debugger.customer');
    $this->post('/customer/get-days', 'API\\CustomersController@getDays')->setName('api.customers.get-days');
    $this->group('/tickets', function () {
        $this->post('/get-categories', 'API\\TicketController@getCategories')->setName('api.tickets.get-categories');
        $this->post('/get-topics', 'API\\TicketController@getTopics')->setName('api.tickets.get-topics');
    });
    $this->post('/site/images/get-image', 'API\\BannerForCountriesController@getBanner')->setName('api.images.get-image');

    $this->get('/graphs/{start}{end}', 'API\\ChartsController@gameHistoricalSell')->setName('api.charts.graphs-historical-sells');


});