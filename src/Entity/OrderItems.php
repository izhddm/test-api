<?php

namespace App\Entity;

use App\Entity\Traits\CreatedAtTrait;
use App\Entity\Traits\UpdatedAtTrait;
use App\Repository\OrderItemsRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=OrderItemsRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class OrderItems
{
    use CreatedAtTrait, UpdatedAtTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Exclude()
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $barcode;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $cost;

    /**
     * @ORM\Column(type="integer")
     */
    private $taxPerc;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $taxAmt;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $trackingNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $canceled;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shippedStatusSky;

    /**
     * @ORM\ManyToOne(targetEntity=Order::class, inversedBy="orderItems")
     * @ORM\JoinColumn(nullable=false)
     */
    private $orderId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBarcode(): ?string
    {
        return $this->barcode;
    }

    public function setBarcode(string $barcode): self
    {
        $this->barcode = $barcode;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(string $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getTaxPerc(): ?int
    {
        return $this->taxPerc;
    }

    public function setTaxPerc(int $taxPerc): self
    {
        $this->taxPerc = $taxPerc;

        return $this;
    }

    public function getTaxAmt(): ?string
    {
        return $this->taxAmt;
    }

    public function setTaxAmt(string $taxAmt): self
    {
        $this->taxAmt = $taxAmt;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    public function setTrackingNumber(string $trackingNumber): self
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    public function getCanceled(): ?string
    {
        return $this->canceled;
    }

    public function setCanceled(string $canceled): self
    {
        $this->canceled = $canceled;

        return $this;
    }

    public function getShippedStatusSky(): ?string
    {
        return $this->shippedStatusSky;
    }

    public function setShippedStatusSky(string $shippedStatusSky): self
    {
        $this->shippedStatusSky = $shippedStatusSky;

        return $this;
    }

    public function getOrderId(): ?Order
    {
        return $this->orderId;
    }

    public function setOrderId(?Order $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }
}
