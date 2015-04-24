<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MaintenanceSchedule extends Model {

    protected $table = 'maintenance_schedules';

    protected $fillable = [
        'interval_distance',
        'interval_months',
        'user_id',
        'maint_type_id',
        'vehicle_id'
    ];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id', 'id');
    }

    public function maintenance_type()
    {
        return $this->belongsTo('App\Models\MaintenanceType', 'maint_type_id', 'id');
    }

    public static function input(array $attributes)
    {
        return new static($attributes);
    }

    public function buildScheduleData($request)
    {
        $data['vehicle_id'] = $request->vehicle_id;
        $vehicle = Vehicle::find($request->vehicle_id);
        $data['vehicle'] = $vehicle->vehicle;

        $data['maint_type_id'] = $request->maint_type_id;
        $maintenance_type = Maintenancetype::find($request->maint_type_id);
        $data['maintenance_type'] = $maintenance_type->type;

        $data['interval_distance'] = $request->interval_distance;
        $data['interval_months'] = $request->interval_months;
        $data['user_id'] = Auth::user()->id;

        return $data;
    }

    public function whereUserId()
    {
        return $this->all()->where('user_id', Auth::user()->id);
    }

}
