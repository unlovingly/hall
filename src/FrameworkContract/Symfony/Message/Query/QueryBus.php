<?php

declare(strict_types=1);

namespace App\FrameworkContract\Symfony\Message\Query;

use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class QueryBus implements QueryBusInterface
{
    use HandleTrait {
        handle as handleQuery;
    }

    public function __construct(MessageBusInterface $queryBus)
    {
        $this->messageBus = $queryBus;
    }

    public function handle(QueryInterface $message)
    {
        return $this->handleQuery($message);
    }
}
