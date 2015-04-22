<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceType extends Model {

    protected $table = 'maintenance_types';

    protected $fillable = [
        'name'
    ];

    public function maintenance_logs()
    {
        return $this->hasMany('App\MaintenanceLog','maintenance_type_key', 'id');
    }

}
