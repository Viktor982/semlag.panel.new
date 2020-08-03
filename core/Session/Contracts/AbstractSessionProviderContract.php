<?php


namespace NPCore\Session\Contracts;

use NPCore\Session\Contracts\AbstractSessionStoreContract;

interface AbstractSessionProviderContract
{
    /**
     * AbstractSessionProviderContract constructor.
     * @param \NPCore\Session\Contracts\AbstractSessionStoreContract $store
     */
    public function __construct(AbstractSessionStoreContract $store);

    public function boot();

    /**
     * @param $key
     * @param $value
     */
    public function put($key, $value);

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key);

    /**
     * @param $key
     */
    public function del($key);

    /**
     * @param $key
     * @return bool
     */
    public function has($key);

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function flash($key, $value);

    public function save();

    public function flush();

    public function forget($key);

    /**
     * @return array
     */
    public function __sleep();
}
