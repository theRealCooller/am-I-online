<?php
declare(strict_types=1);

class UrlResponse implements Response
{
    private array $url;
    private RandomUserAgent $randomUserAgent;

    public function __construct(array $url, RandomUserAgent $randomUserAgent)
    {
        $this->randomUserAgent = $randomUserAgent;
        $this->url = $url;
    }

    public function isOk(): bool
    {
        foreach ($this->url as $url) {
            if ($this->isSingleOk($url)) {
                return  true;
            }
        }
        return false;
    }

    private function isSingleOk(string $url): bool
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => $this->randomUserAgent->choose(),
        ]);

        try {
            if (curl_exec($curl)) {
                return true;
            } else {
                return false;
            }
        } finally {
            curl_close($curl);
        }
    }

}
