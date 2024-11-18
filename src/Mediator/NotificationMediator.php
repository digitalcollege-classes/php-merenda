<?php

declare(strict_types=1);

namespace App\Mediator;
use App\Enum\NotificationTypeEnum;

class NotificationMediator extends AbstractNotificationMediator implements NotificationMediatorInterface 
{
    public function setFlashMessage(NotificationTypeEnum $type, string $message): void 
    {
        $_SESSION[$this->nameSession] = ['type' => $type, 'message' => $message];
    }

    public function getFlashMessage(): void 
    {
        if (isset($_SESSION[$this->nameSession])) {
            $message = $_SESSION[$this->nameSession];
            unset($_SESSION[$this->nameSession]); 
            $this->render('modal', $message);
        }
    }
}
