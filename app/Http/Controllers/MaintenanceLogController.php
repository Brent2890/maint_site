<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PrepareLogRequest;
use App\MaintenanceLog;
use App\MaintenanceType;
use App\User;
use App\Vehicle;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::check())
        {
            $data['logs'] = $this->maintenance_log->whereUserId();
        } else {
            $data['logs'] = $this->maintenance_log->all();
        }

        return view('logs.logs')->with($data);
    }

    public function input()
    {
        $data ['vehicles'] = Vehicle::lists('vehicle', 'id');
        $data ['maintenance_types'] = MaintenanceType::lists('type', 'id');

        return view('logs.input_log')->with($data);
    }

    public function store(Request $request)
    {
        $data = $this->maintenance_log->buildLogTemplateData($request);
        MaintenanceLog::input($data)->save();

        return redirect('/logs');
    }

}
