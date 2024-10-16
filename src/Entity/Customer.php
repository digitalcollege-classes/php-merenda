<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

#[ORM\Entity]
class Customer
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column]
    private string $name;

    #[ORM\ManyToOne(targetEntity: Address::class)]
    #[ORM\JoinColumn(name: 'customer_id', referencedColumnName: 'id')]
    private Address $address;

    #[ORM\Column]
    private string $email;

    #[ORM\Column]
    private string $phone;

    #[ORM\Column]
    private string $photo;

    #[ORM\Column(type: 'boolean')]
    private bool $status;

    #[ORM\Column]
    private DateTime $createdAt;

    #[ORM\Column]
    private DateTime $updateAt;

    public function __construct(string $name, string $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->status = true;
        $this->createdAt = new DateTime();
        $this->updateAt = new DateTime();
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

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    public function isStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
    public function setUpdateAt(DateTime $updateAt): void
    {
        $this->updateAt = $updateAt;
    }
}
