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
    private string $street;

    #[ORM\Column]
    private string $number;

    #[ORM\Column]
    private string $zipcode;

    #[ORM\Column]
    private string $district;

    #[ORM\Column]
    private string $city;

    #[ORM\Column]
    private string $state;

    #[ORM\Column]
    public DateTime $createdAt;

    #[ORM\Column]
    public DateTime $updateAt;

    public function full(): string
    {
        return "{$this->street}, {$this->number} - {$this->district}, {$this->city}-{$this->state},{$this->zipcode}";
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getZipcode(): string
    {
        return $this->zipcode;
    }

    public function setZipcode(string $zip): void
    {
        $this->zipcode = $zip;
    }

    public function getDistrict(): string
    {
        return $this->district;
    }

    public function setDistrict(string $district): void
    {
        $this->district = $district;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
    public function getUpdatedAt(): DateTime
    {
        return $this->updateAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updateAt = $updatedAt;
    }
}
