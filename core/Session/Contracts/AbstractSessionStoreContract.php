<?php


namespace NPCore\Session\Contracts;

use NPCore\Session\Contracts\AbstractSessionProviderContract;

interface AbstractSessionStoreContract
{
    public function __construct();

    /**
     * @param $id
     * @param Session $session
     * @return bool
     */
    public function store($id, AbstractSessionProviderContract $session);

    /**
     * @param $id
     * @return mixed
     */
    public function load($id);

    /**
     * @param $id
     * @return bool
     */
    public function delete($id);
}