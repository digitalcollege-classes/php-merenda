<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity]
class Address
{
    #[ORM\Id] #[ORM\Column(type: 'integer')] #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column]
    private string $name;

    #[ORM\Column]
    private string $user;

    #[ORM\Column]
    private string $description;

    #[ORM\Column]
    private string $functions;
}
