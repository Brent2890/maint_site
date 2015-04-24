<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrepareLogRequest;
use App\Models\MaintenanceLog;
use App\Models\MaintenanceType;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class MaintenanceLogController extends Controller {

    public function __construct
    (
        Vehicle $vehicle,
        MaintenanceType $maintenance_type,
        MaintenanceLog $maintenance_log
    ) {
        $this->vehicle = $vehicle;
        $this->maintenance_type = $maintenance_type;
        $this->maintenance_log = $maintenance_log;
    }

    public function index()
    {
        $data['logs'] = $this->maintenance_log->whereUserId();

        return view('logs.logs')->with($data);
    }

    public function input()
    {
        $data ['vehicles'] = Vehicle::lists('vehicle', 'id');
        $data ['maintenance_types'] = MaintenanceType::lists('type', 'id');

        return view('logs.input_log')->with($data);
    }

    public function store(PrepareLogRequest $request)
    {
        $data = $this->maintenance_log->buildLogData($request);
        MaintenanceLog::input($data)->save();

        return redirect('/logs');
    }

}
