<?php

namespace App\Repositories;

use App\Models\DeliveryStatus;
use RonasIT\Support\Repositories\BaseRepository;

/**
 * @property  DeliveryStatus $model
*/
class DeliveryStatusRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(DeliveryStatus::class);
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->model
            ->with($this->relations)
            ->orderBy($this->sortBy, $this->sortOrder)
            ->get();
    }
}
