<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceLog extends Model {

    protected $table = 'maintenance_logs';

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle','id', 'vehicle_id');
    }

    public function maintenance_type()
    {
        return $this->belongsTo('App\MaintenanceType','id', 'maintenance_type_key');
    }

    public function user()
    {
        return $this->belongsTo('App\User','id', 'user_id');
    }


}
