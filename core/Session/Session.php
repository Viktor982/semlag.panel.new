<?php


namespace NPCore\Session;

use NPCore\Session\Contracts\AbstractSessionProviderContract;
use NPCore\Session\Contracts\AbstractSessionStoreContract;

class Session implements AbstractSessionProviderContract
{
    /**
     * @var array
     */
    private $data = [];

    private $flash = [];

    private $newFlash = [];

    /**
     * @var string
     */
    private $id;

    /**
     * @var SessionStore
     */
    private $store;

    public function __construct(AbstractSessionStoreContract $store)
    {
        $this->store = $store;
    }

    public function boot()
    {
        $cookie = config()['session']['cookie'];
        $lifetime = config()['session']['lifetime'] * 60;
        if(isset($_COOKIE['npd_session'])){
            $this->id = $_COOKIE[$cookie];
            setcookie('npd_session', $this->id, time() + $lifetime, '/');
            try{
                $content = $this->store->load($this->id);
                $this->hydrate($content);
            }catch (\Exception $e){
                setcookie('npd_session', null, -1, '/');
                $currentUrl = current_url();
                header("Location: {$currentUrl}");
                exit();
            }
        }else{
            $this->id = str_random(40);
            setcookie($cookie, $this->id, time() + $lifetime, '/');
            $this->store->store($this->id, $this);
        }
    }

    private function hydrate($content)
    {
        $this->data = $content->data;
        $this->flash = $content->newFlash;
        $this->newFlash = [];
        $this->store->store($this->id, $this);
    }

    /**
     * @param $key
     * @param $value
     */
    public function put($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->has($key) ? array_merge($this->data, $this->flash)[$key] : null;
    }

    /**
     * @param $key
     */
    public function del($key)
    {
        if(key_exists($key, $this->data))
            unset($this->data[$key]);

        if(key_exists($key, $this->flash))
            unset($this->flash[$key]);
    }

    /**
     * @param $key
     * @return bool
     */
    public function has($key)
    {
        return (key_exists($key, array_merge($this->flash, $this->data)));
    }

    public function save()
    {
        $this->store->store($this->id, $this);
    }

    public function flush()
    {
        $this->data = [];
        $this->flash = [];
    }

    /**
     * @param $key
     */
    public function forget($key)
    {
        return $this->del($key);
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        return ['data', 'flash', 'newFlash', 'id'];
    }

    /**
     * @param $key
     * @param $value
     */
    public function flash($key, $value)
    {
        $this->newFlash[$key] = $value;
    }
}
