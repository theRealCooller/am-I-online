<?php
declare(strict_types=1);

class UrlResponse
{
    private string $url;
    private RandomUserAgent $randomUserAgent;

    public function __construct(string $url, RandomUserAgent $randomUserAgent)
    {
        $this->randomUserAgent = $randomUserAgent;
        $this->url = $url;
    }

    public function isOk(): bool {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_URL => $this->url,
            CURLOPT_USERAGENT => $this->randomUserAgent->choose(),
        ]);
        try {
            if (curl_exec($curl)) {
                return true;
            } else
                return false;
        } finally {
            curl_close($curl);
        }
    }
}
