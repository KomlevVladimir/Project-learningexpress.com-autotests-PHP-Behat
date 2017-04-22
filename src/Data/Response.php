<?php

namespace src\Data;

class Response
{
    public $url;
    public $fullResponse;
    public $statusCode;

    /**
     * @param string $url
     * @return Response
     */
    public static function fromUrl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);

        curl_close($ch);

        if (!preg_match('|HTTP/1.1 ([^\r]*)|', $result, $matches)) {
            throw new \RuntimeException("Invalid response: can't get status code");
        }

        $response = new Response();
        $response->url = $url;
        $response->fullResponse = $response;
        $response->statusCode = $matches[1];

        return $response;
    }
}