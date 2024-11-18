<?php

declare(strict_types=1);

namespace App\Enum;

enum NotificationTypeEnum: string
{
    case Success = 'success';
    case Failure = 'danger';
    case Warning = 'warning';
    case inProgress = 'secondary';
}