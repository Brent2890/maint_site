<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrepareScheduleRequest;
use App\Models\MaintenanceLog;
use App\Models\MaintenanceSchedule;
use App\Models\MaintenanceType;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class MaintenanceScheduleController extends Controller {

    public function __construct
    (
        Vehicle $vehicle,
        MaintenanceType $maintenance_type,
        MaintenanceSchedule $maintenance_schedule
    ) {
        $this->vehicle = $vehicle;
        $this->maintenance_type = $maintenance_type;
        $this->maintenance_schedule = $maintenance_schedule;
    }

    public function index()
    {
        if(Auth::check())
        {
            $data['schedules'] = $this->maintenance_schedule->whereUserId();
        } else {
            $data['schedules'] = $this->maintenance_schedule->all();
        }
        return view('schedule.schedule')->with($data);
    }

    public function input()
    {
        $data ['vehicles'] = Vehicle::lists('vehicle', 'id');
        $data ['maintenance_types'] = MaintenanceType::lists('type', 'id');

        return view('schedule.input_schedule')->with($data);
    }

    public function store(PrepareScheduleRequest $request)
    {
        $data = $this->maintenance_schedule->buildScheduleData($request);
        MaintenanceSchedule::input($data)->save();

        return redirect('/schedule');
    }

}
