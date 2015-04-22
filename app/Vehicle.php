<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {

    protected $table = 'vehicles';

	protected $fillable = [
        'vehicle'
    ];

    public function maintenance_logs()
    {
        return $this->hasMany('App\MaintenanceLog','vehicle_id', 'id');
    }

}
