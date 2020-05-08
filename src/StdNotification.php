<?php
declare(strict_types=1);

class StdNotification implements Notification
{
    public function alertStatus(): void
    {
        echo "Your connection is granted again from:" . time();
    }
}
