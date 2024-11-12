<?php

declare(strict_types=1);

namespace App\Controller;

interface ControllerInterface
{
    public function add(): void;
    public function list(): void;
    public function edit(): void;
    public function remove(): void;
}