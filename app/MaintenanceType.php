<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceType extends Model {

    protected $table = 'maintenance_types';

    protected $fillable = [
        'name'
    ];

    public function maintenance_logs()
    {
        return $this->hasMany('App\MaintenanceLog','maint_type_id', 'id');
    }

    public function maintenance_schedule()
    {
        return $this->hasMany('App\MaintenanceSchedule','maint_type_id', 'id');
    }

}
