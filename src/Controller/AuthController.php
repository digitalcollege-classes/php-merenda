<?php

declare(strict_types=1);

namespace App\Controller;

use App\Config\ViewConfig;
use App\Connection\Connection;
use App\Entity\User;

class AuthController extends AbstractController
{
    public function login(): void
    {
        if (isset($_SESSION['user_logged'])) {
            $this->dashboard();
            exit;
        }

        if (empty($_POST)) {
            ViewConfig::hideNavBar(true);
            ViewConfig::hideMenu(true);
            parent::render('auth/login');
            ViewConfig::clearConfigs();
            return;
        }

        $repository = Connection::getEntityManager()->getRepository(User::class);
        $user = $repository->findOneBy(['email' => $_POST['email']]);

        if ($user === null) {
            die('Usuário não encontrado');
        }

        if (!password_verify($_POST['password'], $user->getPassword())) {
            die('Senha incorreta');
        }

        // Carrega as permissões de cada tipo de usuário do arquivo de configuração
        $permissionsConfig = include '../config/permissions.php';

        $_SESSION['user_logged'] = [
            'id' => $user->getId(),
            'name' => $user->getName(),
            'type' => $user->getType(),
            'permissions' => $permissionsConfig[$user->getType()] ?? [],
        ];

        $this->dashboard();
    }

    public function logout(): void
    {
        session_destroy();
        header('location: /login');
        exit;
    }

    // Redireciona para o dashboard específico com base no tipo de usuário
    public function dashboard(): void
    {
        $userType = $_SESSION['user_logged']['type'] ?? null;

        if ($userType === 'admin') {
            header('Location: /dashboard/admin');
        } elseif ($userType === 'vendor') {
            header('Location: /dashboard/vendor');
        } elseif ($userType === 'customer') {
            header('Location: /dashboard/customer');
        } else {
            header('Location: /login');
        }
        exit;
    }

    // Dashboard do Admin
    public function adminDashboard(): void
    {
        // Verifica se o usuário tem permissão para acessar o dashboard do admin
        $this->checkPermissions('admin');
        parent::render('dashboard/adminDashboard');
    }

    // Dashboard do Vendor
    public function vendorDashboard(): void
    {
        $this->checkPermissions('vendor');
        parent::render('dashboard/vendorDashboard');
    }

    // Dashboard do Customer
    public function customerDashboard(): void
    {
        $this->checkPermissions('customer');
        parent::render('dashboard/customerDashboard');
    }

    // Verifica o tipo de usuário para acessar o dashboard correto
    private function checkPermissions(string $requiredType): void
    {
        if ($_SESSION['user_logged']['type'] !== $requiredType) {
            die('Acesso negado');
        }
    }
}
