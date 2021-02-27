<?php

declare(strict_types=1);

namespace App\FrameworkContract\Symfony\Message\Query;

interface QueryBusInterface
{
    public function handle(QueryInterface $message);
}
