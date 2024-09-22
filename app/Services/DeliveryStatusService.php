<?php

namespace App\Services;

use App\Repositories\DeliveryStatusRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use RonasIT\Support\Services\EntityService;

/**
 * @property DeliveryStatusRepository $repository
 * @mixin DeliveryStatusRepository
 */
class DeliveryStatusService extends EntityService
{
    public function __construct()
    {
        $this->setRepository(DeliveryStatusRepository::class);
    }
}
