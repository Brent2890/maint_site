<?php namespace App;

use App\Http\Requests\PrepareLogRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MaintenanceLog extends Model {

    protected $table = 'maintenance_logs';

   protected $fillable = [
        'comment',
        'user_id',
        'cost',
        'maint_type_id',
        'vehicle_id',
        'mileage',
    ];


    public function vehicle()
    {

        return $this->belongsTo('App\Vehicle', 'vehicle_id', 'id');
    }

    public function maintenance_type()
    {

        return $this->belongsTo('App\MaintenanceType', 'maint_type_id', 'id');
    }

    public function user()
    {

        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public static function input(array $attributes)
    {
        return new static($attributes);
    }

    public function whereUserId()
    {

        return $this->all()->where('user_id', Auth::user()->id);
    }





}
