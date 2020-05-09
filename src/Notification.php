<?php
declare(strict_types=1);

interface Notification
{
    public function notify(): void;
}
