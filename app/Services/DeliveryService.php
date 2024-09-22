<?php

namespace App\Services;

use App\Models\DeliveryStatus;
use App\Repositories\DeliveryRepository;
use App\Repositories\DeliveryStatusRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use RonasIT\Support\Services\EntityService;

/**
 * @property DeliveryRepository $repository
 * @mixin DeliveryRepository
 */
class DeliveryService extends EntityService
{
    public function __construct()
    {
        $this->setRepository(DeliveryRepository::class);
    }

    public function statusChange($request): string
    {
        $delivery_id = $request->delivery;
        $inpit_status = $request->input('status');

        $delivery = $this
            ->searchQuery(['query' => $delivery_id])
            ->filterByQuery(['id'])
            ->getSearchResults();
        $delivery = $delivery->first();

        $deliveryStatus = DeliveryStatus::where('id', $delivery->status)->first();
        $deliveryStatusQueue = $deliveryStatus->queue + 1;
        // TODO: оптимизировать запрос , убрать повторый запрос к модели, так как модель не велика оставил как есть
        $deliveryStatusQueueNext = DeliveryStatus::where('queue', $deliveryStatusQueue)->first();

        if ($inpit_status == $deliveryStatusQueueNext->status_name) {
            if ($inpit_status == "shipped") {
                // TODO: тут можно дописать логику для назначения водителя
            }

            $data = $delivery;
            $data->status = $deliveryStatusQueue;
            $data = $data->toArray();

            return $this->repository->update($delivery_id, $data);

        } else {
            return "failure";
        }
    }
}
