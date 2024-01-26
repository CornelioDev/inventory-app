<?php
declare(strict_types=1);

namespace App\Model;

class Article
{
    private ?int $id;
    private string $name;
    private string $description;
    private float $price;
    private string $createdAt;

    public function __construct(string $name, string $description, float $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->createdAt = date('Y-m-d H:i:s');
    }

    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function createdAt(): string
    {
        return $this->createdAt;
    }

    // Setters
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setDescription(string $description)
    {
        $this->description = $description;
    }
    public function setPrice(float $price)
    {
        $this->price = $price;
    }
}