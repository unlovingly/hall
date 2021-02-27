<?php

declare(strict_types=1);

namespace App\FrameworkContract\Symfony\Message\Command;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;

final class CommandBus implements CommandBusInterface
{
    private MessageBusInterface $commandBus;

    public function __construct(MessageBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function dispatch(CommandInterface|Envlope $command): void
    {
        $c = $command instanceof Envelope ? $command->getMessage() : $command;

        $this->commandBus->dispatch($c);
    }
}
