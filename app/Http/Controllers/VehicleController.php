<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller {

    public function __construct
    (
        Vehicle $vehicle
    ) {
        $this->vehicle = $vehicle;
    }

    public function index()
    {
        return view('account_details.add_vehicle');
    }

    public function store(Request $request)
    {
        $data = $this->vehicle->buildVehicleData($request);
        Vehicle::input($data)->save();

        return redirect('/logs');
    }

}
