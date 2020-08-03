<?php


namespace NPCore\Session;

use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;
use NPCore\Session\Contracts\AbstractSessionStoreContract;
use NPCore\Session\Contracts\AbstractSessionProviderContract;

class SessionStore implements AbstractSessionStoreContract
{
    /**
     * @var Filesystem
     */
    private $fileSystem;

    public function __construct()
    {
        $adapter = new Local(realpath(__DIR__.'/../../compiled/sessions'));
        $this->fileSystem = new Filesystem($adapter);
    }

    /**
     * @param $id
     * @param Session $session
     * @return bool
     */
    public function store($id, AbstractSessionProviderContract $session)
    {
        return $this->fileSystem->put($id, serialize($session));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function load($id)
    {
        if($this->fileSystem->has($id)){
            return unserialize($this->fileSystem->read($id));
        }
        throw new \Exception("session file don't exists");
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->fileSystem->delete($id);
    }
}