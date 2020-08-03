<?php

namespace NPCore\Http;

use Psr\Http\Message\ServerRequestInterface;

class Request
{
    /**
     * @var array
     */
    private $routeArgs;

    /**
     * @var array
     */
    private $inputs;

    /**
     * @var array
     */
    private $files;

    /**
     * Request constructor.
     * @param array $inputs
     * @param array $routeArgs
     * @param array $files
     */
    public function __construct(array $inputs, array $routeArgs, array $files)
    {
        $this->inputs = $inputs;
        $this->routeArgs = $routeArgs;
        $this->files = $files;
    }

    /**
     * @param ServerRequestInterface $request
     * @param array $routeArgs
     * @return static
     */
    public static function createFromSlimRequest(ServerRequestInterface $request, array $routeArgs)
    {
        $inputs = $request->getParsedBody();
        $inputs = ($inputs) ? $inputs : [];
        $files = $request->getUploadedFiles();
        return new static($inputs, $routeArgs, $files);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    private function collectArgs()
    {
        return collect(array_merge($this->inputs, $this->routeArgs));
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->collectArgs()->toArray();
    }

    /**
     * @param array $pieces
     * @return array
     */
    public function only(array $pieces)
    {
        return $this->collectArgs()->only($pieces)->toArray();
    }

    /**
     * @param array $pieces
     * @return array
     */
    public function except(array $pieces)
    {
        return $this->collectArgs()->except($pieces)->toArray();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function inputs()
    {
        return collect($this->inputs);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function routeArgs()
    {
        return collect($this->routeArgs);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function files()
    {
        return collect($this->files);
    }
}