<?php
declare(strict_types=1);

class StdNotification implements Notification
{
    public function notify(): void
    {
        echo "Your connection is granted again from: " . date('d.m.Y - H:i', time());
    }
}
