<?php

namespace App\Http\Controllers;

use App\Exports\VehicleMontlyExport;
use App\Exports\VehicleUseHistoryExport;
use App\Models\Vehicle;
use App\Models\VehicleOrder;
use App\Models\VehicleUseHistory;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class VehicleHiistoryController extends Controller
{
    public function index()
    {
        $histories = VehicleUseHistory::join('vehicle_orders', 'vehicle_use_histories.vehicle_order_id', "=", "vehicle_orders.id")
            ->select('vehicle_use_histories.*', 'vehicle_orders.*')
            ->latest('vehicle_use_histories.created_at')
            ->get();
        return view('backend.V-report', ['datas' => $histories]);
    }

    public function create(Request $request)
    {
        $validate = $request->validate([
            "start_rute" => 'required',
            "destination" => 'required',
            "date_start" => 'required',
            "fuel_consums" => 'required',
            "description" => 'required',
            "plat_number" => 'required',
            "order_id" => 'required'
        ]);

        $vehicle = Vehicle::where('plat_number', $validate["plat_number"])->first();
        $v_id = null;
        if ($vehicle) {
            $v_id = $vehicle->id;
            $vehicle->is_ready = true;
            $vehicle->save();
        }
        VehicleOrder::where('id', $validate['order_id'])->update(['finish' => true]);

        $data = [
            "vehicle_id" => $v_id,
            "vehicle_order_id" => $validate["order_id"],
            "start_rute" => $validate["start_rute"],
            "destination" => $validate["destination"],
            "fuel_consums" => $validate["fuel_consums"],
            "description" => $validate["description"],
            "date_start" => $validate["date_start"],
            "date_finish" => date('Y-m-d')
        ];

        VehicleUseHistory::create($data);
        return redirect()->route('v-acc-bySupperior')->with('success', 'mobil telah kembali');
    }

    public function exportWeeklyExcel()
    {
        return Excel::download(new VehicleUseHistoryExport, 'laporanMingguan' . date('Y-m-d') . '.xlsx');
    }

    public function exportMontlyExcel()
    {
        return Excel::download(new VehicleMontlyExport, 'laporanBulanan-' . date('Y-m-d') . '.xlsx');
    }
}
