<?php

namespace App\Repositories;

use App\Models\MaintenanceType;

class MaintenanceTypesDBRepository extends \App\Repositories\AbstractDBRepository implements MaintenanceTypesRepositoryInterface
{
    function __construct(MaintenanceType $model)
    {
        $this->model = $model;
    }

}
