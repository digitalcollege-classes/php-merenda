<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Collection;

#[ORM\Entity]
class Category
{
    #[ORM\Id] #[ORM\Column(type: 'integer')] #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(length: 30)]
    private string $name;

    #[ORM\Column]
    private string $description;

    #[ORM\Column]
    private string $image;

    #[ORM\OneToMany(targetEntity: Product::class, mappedBy: 'category')]
    private iterable $products;

    public function __construct() {}

    public function getProducts(): iterable
    {
        return $this->products;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}
