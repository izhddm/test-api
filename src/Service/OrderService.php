<?php

namespace App\Service;

use App\Dto\SearchDto;
use App\Entity\Order;
use App\Entity\OrderItems;
use App\Repository\OrderItemsRepository;
use App\Repository\OrderRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class OrderService
{
    private OrderRepository $orderRepository;

    public function __construct(
        OrderRepository $orderRepository
    )
    {
        $this->orderRepository = $orderRepository;
    }

    public function searchOrders(SearchDto $searchDto)
    {
        $dateFrom = DateTime::createFromFormat('Ymd H:s', $searchDto->date_from . ' 00:00');
        $dateTo = DateTime::createFromFormat('Ymd H:s', $searchDto->date_to . ' 00:00');

        return $this->orderRepository->findByOrders($searchDto->count, $dateFrom, $dateTo, $searchDto->currency_code);
    }

    public function getOrder($orderId): ?Order
    {
        return $this->orderRepository->findOneBy(['orderId' => $orderId]);
    }
}