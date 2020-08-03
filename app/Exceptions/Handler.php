<?php

namespace NPDashboard\Exceptions;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;

class Handler
{
    /**
     * @param $request
     * @param $response
     * @param \Exception $exception
     * @return mixed
     */
    public function handle($request, $response, $exception)
    {
        $fopen = fopen(config()['app']['log'] . '/npdashboard.log', 'a');
        fwrite($fopen, $this->convertExceptionToString($exception));
        fclose($fopen);
        $response = $response->withStatus(500);
        $response->getBody()
            ->write(
                view('pages.errors.exception', ['exception' => $exception])
            );
        return $response;
    }

    private function logger()
    {
        $dir = config()['app']['log'];
        $adapter = new Local($dir);
        $filesystem = new Filesystem($adapter);
        return $filesystem;
    }

    private function convertExceptionToString($exception)
    {
        $now = date("H:i:s d/m/Y");
        $url = (php_sapi_name() == "cli") ? __FILE__ : current_url();
        $template = <<<TPL
########################################################################
ocurred: {$now}
message: {$exception->getMessage()} 
file: {$exception->getFile()} line:({$exception->getLine()})
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
{$exception->getTraceAsString()}
########################################################################


TPL;
        return $template;
    }
}