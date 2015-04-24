<?php namespace App\Models;

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
        'mileage'
    ];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id', 'id');
    }

    public function maintenance_type()
    {
        return $this->belongsTo('App\Models\MaintenanceType', 'maint_type_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public static function input(array $attributes)
    {
        return new static($attributes);
    }

    public function whereUserId()
    {
        if(Auth::check())
        {
            $data['logs'] = $this->all()->where('user_id', Auth::user()->id);
        } else {
            $data['logs'] = $this->all();
        }

        return $data['logs'];
    }

    public function buildLogData($request)
    {
        $request->cost = str_replace('$', '', $request->cost);
        $data['cost'] = $request->cost;

        $data['vehicle_id'] = $request->vehicle_id;
        $vehicle = Vehicle::find($request->vehicle_id);
        $data['vehicle'] = $vehicle->vehicle;

        $data['maint_type_id'] = $request->maintenance_type_id;
        $maintenance_type = Maintenancetype::find($request->maintenance_type_id);
        $data['maintenance_type'] = $maintenance_type->type;

        $data['mileage'] = $request->mileage;
        $data['comment'] = $request->comment;
        $data['user_id'] = Auth::user()->id;

        return $data;
    }

}
