<?php

declare(strict_types=1);

namespace App\Controller;

class PageErrorController extends AbstractController
{
    public function notFound(): void
    {
        $this->render('page-error/not-found');
    }
}