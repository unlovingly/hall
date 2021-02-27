<?php

declare(strict_types=1);

namespace App\FrameworkContract\Symfony\Message\Command;

interface CommandBusInterface
{
    public function dispatch(CommandInterface|Envlope $command): void;
}
