<?php
declare(strict_types=1);


namespace AppBundle\Entity;


trait Timestampable
{
    /**
     * @var \DateTime |null $created
     * @ORM\Column(name="created_at", type="date")
     * @var ?\DateTime
     */
    protected $createdAt;

    /**
     * @var \DateTime|null $updated
     * @ORM\Column(name="updated_at", type="date")
     * @var ?\DateTime
     */
    protected $updatedAt;

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Gets triggered only on insert
     * @ORM\PrePersist
     */
    public function onPrePersist(): void
    {
        $this->createdAt = !$this->createdAt ? new \DateTime() : $this->createdAt;
        $this->updatedAt = !$this->updatedAt ? new \DateTime() : $this->updatedAt;
    }

    /**
     * Gets triggered every time on update
     * @ORM\PreUpdate
     */
    public function onPreUpdate(): void
    {
        $this->updatedAt = new \DateTime();
    }
}