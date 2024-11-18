<?php

declare(strict_types=1);

namespace App\Mediator;
use App\Enum\NotificationTypeEnum;

interface NotificationMediatorInterface
{
    public function setFlashMessage(NotificationTypeEnum $type, string $message): void;
    
    public function getFlashMessage(): void;
}