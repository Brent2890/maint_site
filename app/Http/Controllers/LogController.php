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

class LogController extends Controller {

    public function __construct
    (
        Vehicle $vehicle,
        MaintenanceType $maintenance_type,
        MaintenanceLog $maintenance_log,
        user $user
    ) {
        $this->vehicle = $vehicle;
        $this->maintenance_type = $maintenance_type;
        $this->maintenance_log = $maintenance_log;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(Auth::check())
        {
            $data['logs'] = $this->maintenance_log->whereUserId();
        } else {
            $data['logs'] = $this->maintenance_log->all();
        }

        return view('logs.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function input()
    {
        $data ['vehicles'] = Vehicle::lists('vehicle', 'id');
        $data ['maintenance_types'] = MaintenanceType::lists('name', 'id');

        return view('logs.input')->with($data);
    }

    public function confirm(PrepareLogRequest $request, Guard $auth)
    {
        $template = $this->compileLogTemplate($request, $auth);

        return view('logs.confirm', compact('template'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->createLog($request);

        return redirect('/');
    }

    public function compileLogTemplate(PrepareLogRequest $request)
    {

        $data = $this->buildLogTemplateData($request);

        session()->flash('log', $data);

        return view()->file(app_path('Http/Templates/confirm_input.blade.php'), $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function schedule()
    {
        return view('logs.schedule');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function createLog(Request $request)
    {

        $data = session()->get('log') + ['template' => $request->input('template')];

        MaintenanceLog::input($data)->save();
    }

    public function buildLogTemplateData($request)
    {

        $request->cost = str_replace('$', '', $request->cost);
        $data['cost'] = $request->cost;



        $data['vehicle_id'] = $request->vehicle_id;
        $vehicle = $this->vehicle->find($request->vehicle_id);
        $data['vehicle'] = $vehicle->vehicle;
        $data['maint_type_id'] = $request->maintenance_type_id;
        $maintenance_type = $this->maintenance_type->find($request->maintenance_type_id);
        $data['maintenance_type'] = $maintenance_type->name;

        $data['date'] = $request->date;
        $data['mileage'] = $request->mileage;
        $data['comment'] = $request->comments;
        $data['user_id'] = Auth::user()->id;
        $data['name'] = Auth::user()->name;



        return $data;
    }

}
