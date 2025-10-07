<?php

declare(strict_types=1);

namespace App\Entity\UniProductManagement;

use App\Repository\UniProductManagement\UniProductChangeHistoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniProductChangeHistoryRepository::class)]
#[ORM\Table(name: 'uni_product_change_history')]
class UniProductChangeHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(name: 'object_id', type: 'string', length: 255)]
    private ?string $objectId = null;

    #[ORM\Column(name: 'full_path', type: 'string', length: 255)]
    private ?string $fullObjectPath = null;

    #[ORM\Column(name: 'object_class', type: 'string', length: 255)]
    private ?string $objectClass = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTime $timestamp = null;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $user = null;

    /**
     * @var array<string, mixed>
     */
    #[ORM\Column(name: 'previous_values', type: 'json', nullable: true)]
    private array $previousValues = [];

    /**
     * @var array<string, mixed>
     */
    #[ORM\Column(name: 'new_values', type: 'json', nullable: true)]
    private array $newValues = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    public function setObjectId(string $objectId): static
    {
        $this->objectId = $objectId;

        return $this;
    }

    public function getFullObjectPath(): ?string
    {
        return $this->fullObjectPath;
    }

    public function setFullObjectPath(string $fullObjectPath): static
    {
        $this->fullObjectPath = $fullObjectPath;

        return $this;
    }

    public function getObjectClass(): ?string
    {
        return $this->objectClass;
    }

    public function setObjectClass(string $objectClass): static
    {
        $this->objectClass = $objectClass;

        return $this;
    }

    public function getTimestamp(): ?\DateTime
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTime $timestamp): static
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getPreviousValues(): array
    {
        return $this->previousValues;
    }

    /**
     * @param array<string, mixed> $previousValues
     */
    public function setPreviousValues(array $previousValues): static
    {
        $this->previousValues = $previousValues;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function getNewValues(): array
    {
        return $this->newValues;
    }

    /**
     * @param array<string, mixed> $newValues
     */
    public function setNewValues(array $newValues): static
    {
        $this->newValues = $newValues;

        return $this;
    }

    /**
     * @return list<string>
     */
    public function getChangedFields(): array
    {
        return array_keys($this->newValues);
    }
}
