<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MaintenanceType extends Model {

    protected $table = 'maintenance_types';

    protected $fillable = [
        'type'
    ];

    public function maintenance_logs()
    {
        return $this->hasMany('App\Models\MaintenanceLog', 'maint_type_id', 'id');
    }

    public function maintenance_schedule()
    {
        return $this->hasMany('App\Models\MaintenanceSchedule', 'maint_type_id', 'id');
    }

    public static function input(array $attributes)
    {
        return new static($attributes);
    }

    public function buildMaintenanceTypeData($request)
    {
        $data['type'] = $request->maintenance_type;

        return $data;
    }

}
