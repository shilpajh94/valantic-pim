<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\UniProductChangeHistoryRepository;
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
     * @var array<string> Specifies that the array contains strings
     */
    #[ORM\Column(name: 'change_fields', type: 'json', nullable: true)]
    private array $changeFields = [];

    /**
     * @var array<mixed> Specifies that the array contains mixed types
     */
    #[ORM\Column(name: 'previous_values', type: 'json', nullable: true)]
    private array $previousValue = [];

    /**
     * @var array<mixed> Specifies that the array contains mixed types
     */
    #[ORM\Column(name: 'new_values', type: 'json', nullable: true)]
    private array $newValue = [];

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
     * @return array<string> The type of values in the array is string
     */
    public function getChangeFields(): array
    {
        return $this->changeFields;
    }

    /**
     * @param array<string> $changeFields Specifies that the array contains strings
     */
    public function setChangeFields(array $changeFields): static
    {
        $this->changeFields = $changeFields;

        return $this;
    }

    /**
     * @return array<mixed> Mixed types are allowed in this array
     */
    public function getPreviousValue(): array
    {
        return $this->previousValue;
    }

    /**
     * @param array<mixed> $previousValue Specifies that the array contains mixed types
     */
    public function setPreviousValue(array $previousValue): static
    {
        $this->previousValue = $previousValue;

        return $this;
    }

    /**
     * @return array<mixed> Mixed types are allowed in this array
     */
    public function getNewValue(): array
    {
        return $this->newValue;
    }

    /**
     * @param array<mixed> $newValue Specifies that the array contains mixed types
     */
    public function setNewValue(array $newValue): static
    {
        $this->newValue = $newValue;

        return $this;
    }
}
