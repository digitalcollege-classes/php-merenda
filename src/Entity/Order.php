<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use App\Enum\OrderTypeEnum;

#[ORM\Entity]
#[ORM\Table(name: 'orders')]
class Order 
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(type: 'integer')]
    private int $type;
    
    #[ORM\Column]
    private array $items;
    
    #[ORM\Column]
    private string $customer;

    #[ORM\Column(nullable: true)]
    private ?float $price;
    
    #[ORM\Column]
    private string $status;
    
    #[ORM\Column]
    private DateTime $createdAt;
    
    #[ORM\Column]
    private DateTime $updateAt;

    public function getId():Int 
    {
        return $this->id;
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function setType(int $type): void
    {
        $this->type = $type;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }


    public function getCustomer(): string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): void
    {
        $this->customer = $customer;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }


    public function getUpdateAt(): DateTime
    {
        return $this->updateAt;
    }

    public function setUpdateAt(DateTime $updateAt): void
    {
        $this->updateAt = $updateAt;
    }

    public function getPublicInfo(): array
    {
        return [
            'id' => $this->id,
            'customer' => $this->customer,
            'items' => $this->items,
            'createdAt' => $this->createdAt->format('d/m/Y H:i:s'),
            'status' => $this->status,
            'price' => $this->price ?? 0,
            'type' => OrderTypeEnum::from($this->type)->name,
        ];
    }
}