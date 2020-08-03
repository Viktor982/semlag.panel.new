<?php

namespace NPDashboard\Services;

use NPDashboard\Services\Traits\HttpClient;

class LanguageService
{
    use HttpClient;

    /**
     * @return \StdClass
     */
    public function getLanguages()
    {
        $request = $this->getNpApiClient()->get('https://www.nptunnel.com/api/langs/get');
        $response = $request->getBody();
        return json_decode($response->__toString());
    }

    /**
     * @param $file
     * @return string
     */
    public function readFile($file)
    {
        $request = $this->getNpApiClient()->post('https://www.nptunnel.com/api/langs/read-file', [
            'query' => [
                'file' => $file
            ]
        ]);
        $response = $request->getBody();
        return $response->__toString();
    }
}