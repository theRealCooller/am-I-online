<?php
declare(strict_types=1);

class ConnectionCheck
{
    private Notification $notification;
    private UrlResponse $urlResponse;

    public function __construct(Notification $notification, UrlResponse $urlResponse)
    {
        $this->notification = $notification;
        $this->urlResponse = $urlResponse;
    }

    public function check(): void {
        if ($this->urlResponse->isOk() === false) {
            $this->check();
        } else {
            $this->notification->notify();
        }
    }
}
