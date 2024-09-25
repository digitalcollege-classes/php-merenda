<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;

class Order 
{
    private string $type;
    private array $items;
    private Customer $customer;
    private string $status;
    private DateTime $createdAt;
    private DateTime $updateAt;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
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


    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): void
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


}