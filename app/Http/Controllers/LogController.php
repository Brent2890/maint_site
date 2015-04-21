<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PrepareLogRequest;
use App\MaintenanceType;
use App\Vehicle;
use Illuminate\Http\Request;

class LogController extends Controller {

    public function __construct
    (
        Vehicle $vehicle,
        MaintenanceType $maintenance_type
    ){
        $this->vehicle = $vehicle;
        $this->maintenance_type = $maintenance_type;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('logs.index');
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

    public function confirm(PrepareLogRequest $request)
    {
        $request->cost = str_replace('$','',$request->cost);
        $data['cost'] = $request->cost;

        $vehicle = $this->vehicle->find($request->vehicle_id);
        $data['vehicle'] = $vehicle->vehicle;

        $maintenance_type = $this->maintenance_type->find($request->maintenance_type_id);
        $data['maintenance_type'] = $maintenance_type->name;

        $data['date'] = $request->date;
        $data['mileage'] = $request->mileage;
        $data['comments'] = $request->comments;

        $template = view()->file(app_path('Http/Templates/confirm_input.blade.php'), $data);
       // dd($template);


        return view('logs.confirm', compact('template'));
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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

}
