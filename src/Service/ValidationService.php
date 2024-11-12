<?php

declare(strict_types=1);

namespace App\Service;

class ValidationService
{
    public static function stop(): void
    {
        unset($_SESSION['has_empty_fields']);
        //session_destroy();
    }

    public static function foundErrors(): bool
    {
        $foundErrors = true === empty($_POST) || true === self::hasEmptyFields();

        if (false === $foundErrors)
            self::stop();

        return $foundErrors;
    }

    public static function hasEmptyFields(): bool
    {
        foreach ($_POST as $field) {
            if ('' === trim($field)) {
                $_SESSION['has_empty_fields'] = true;
                return true;
            }
        }

        return false;
    }

    public static function renderErrors(): void
    {
        if (true === isset($_SESSION['has_empty_fields'])) {
            $toastMsg = 'É necessário preencher todos os campos.';
            include '../views/_components/toast.php';
        }
    }
}