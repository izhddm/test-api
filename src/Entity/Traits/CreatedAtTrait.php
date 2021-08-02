<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Mapping\HasLifecycleCallbacks()
 */
trait CreatedAtTrait
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     * @Serializer\Exclude()
     */
    protected $createdAt;

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = new \DateTime();
    }

}