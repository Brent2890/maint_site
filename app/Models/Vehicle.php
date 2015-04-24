<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Vehicle extends Model {

    protected $table = 'vehicles';

	protected $fillable = [
        'vehicle'
    ];

    public function maintenance_logs()
    {
        return $this->hasMany('App\Models\MaintenanceLog','vehicle_id', 'id');
    }

    public function maintenance_schedule()
    {
        return $this->hasMany('App\Models\MaintenanceLog','vehicle_id', 'id');
    }

    public static function input(array $attributes)
    {
        return new static($attributes);
    }

    public function buildVehicleData($request)
    {
        $data['vehicle'] = $request->vehicle_name;
        $data['user_id'] = Auth::user()->id;

        return $data;
    }

}
