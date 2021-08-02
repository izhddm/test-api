<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\HasLifecycleCallbacks()
 */
trait UpdatedAtTrait
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     * @Serializer\Exclude()
     */
    protected $updatedAt;

    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }


    /**
     * @ORM\PreUpdate()
     * @ORM\PrePersist()
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = new \DateTime();
    }

}