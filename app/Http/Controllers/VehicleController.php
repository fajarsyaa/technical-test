<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('hrd')->only(['vehicleService', 'create', 'edit']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Vehicle::all();
        return view('backend.V-data', ['data' => $data]);
    }

    public function vehicleService()
    {
        $datas = Vehicle::where('is_service', true)->get();
        return view('backend.V-is-service', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = Vehicle::where('service_routine', "<=", date('d'))->where('is_service', false)->orderBy('service_routine', 'DESC')->get();
        return view('backend.V-service', ['datas' => $datas]);
    }

    /**
     * Display the specified resource.
     */
    public function serviceFinish(string $id)
    {
        Vehicle::where('id', $id)->update(['is_service' => false, 'is_ready' => true]);
        return redirect()->route('vehicleService')->with('success', 'servis selesai');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Vehicle::where('id', $id)->update(['is_service' => true, 'is_ready' => false]);

        return redirect()->route('vehicle.create')->with('success', 'kendaraan di servis');
    }
}
