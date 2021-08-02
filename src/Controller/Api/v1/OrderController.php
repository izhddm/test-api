<?php

namespace App\Controller\Api\v1;

use App\Dto\SearchDto;
use App\Service\OrderService;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request as Request;

class OrderController
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @Rest\Post("/orders_search")
     * @Rest\View(serializerGroups={"Default"})
     */
    public function searchOrders(SearchDto $searchDto): View
    {
        $orders = $this->orderService->searchOrders($searchDto);
        [$data, $code] = $orders === null ?
            [['success' => false], 400] :
            [$orders, 200];

        return View::create($data, $code);
    }

    /**
     * @Rest\Get("/orders/{orderId}")
     * @Rest\View(serializerGroups={"Default", "details"})
     */
    public function getOrder($orderId): View
    {
        $order = $this->orderService->getOrder($orderId);
        [$data, $code] = $order === null ?
            [['success' => false], 400] :
            [$order, 200];

        return View::create($data, $code);
    }

}