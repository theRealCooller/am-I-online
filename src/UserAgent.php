<?php
declare(strict_types=1);

interface UserAgent
{
    public function choose(): string;
}
