<?php

namespace App\Repositories;

use App\Vehicle;

class VehiclesDBRepository extends \App\Repositories\AbstractDBRepository implements VehiclesRepositoryInterface
{
    function __construct(Vehicle $model)
    {
        $this->model = $model;
    }

}
