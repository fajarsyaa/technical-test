<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use App\Models\Driver;
use App\Models\Headquarters;
use App\Models\Mine;
use App\Models\Vehicle;
use App\Models\VehicleOrder;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class VehicleOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::where('is_ready', 1)->where('vehicle_type', 'ekspedisi')->get();
        $Headquarters = Headquarters::all();
        $brachoffice  = BranchOffice::all();
        $mine         = Mine::all();
        $travel_starts = collect($Headquarters)->concat($brachoffice)->concat($mine);
        $drivers       = Driver::where('is_ready', 1)->get();

        return view('backend.V-order-Barang', ['vehicles' => $vehicles, 'travel_starts' => $travel_starts, 'drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicles = Vehicle::where('is_ready', 1)->where('vehicle_type', 'transport')->get();
        $Headquarters = Headquarters::all();
        $brachoffice  = BranchOffice::all();
        $mine         = Mine::all();
        $travel_starts = collect($Headquarters)->concat($brachoffice)->concat($mine);
        $drivers       = Driver::where('is_ready', 1)->get();

        return view('backend.V-order-Pegawai', ['vehicles' => $vehicles, 'travel_starts' => $travel_starts, 'drivers' => $drivers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "information" => "required",
            "driver" => "required",
            "description" => "required",
            "travel_start" => "required",
            "travel_destination" => "required",
            "approver" => "required|array|min:2"
        ]);


        if (isset($request->plat_number)) {
            $plat_number = $request->plat_number;
            $vehicle_own = "Pribadi";
        } else {
            $plat_number = $request->plat_number_sewa;
            $vehicle_own = "Sewa";
        }

        $data = [
            "date_order" => date('Y-m-d'),
            "plat_number" => $plat_number,
            "vehicle_owner" => $vehicle_own,
            "information" => $validate['information'],
            "travel_start" => $validate['travel_start'],
            "travel_destinations" => $validate['travel_destination'],
            "driver" => $validate['driver'],
            "description" => $validate['description'],
            "to_mdr" =>  collect($validate["approver"])->contains('mdr'),
            "to_spv" =>  collect($validate["approver"])->contains('spv'),
            "to_hrd" =>  collect($validate["approver"])->contains('hrd'),
            "approved_mdr" => false,
            "approved_spv" => false,
            "approved_hrd" => false,
        ];

        $true = VehicleOrder::create($data);
        if ($true) {

            Driver::where('name', $validate['driver'])->update([
                "is_ready" => false
            ]);

            if ($vehicle_own == "Pribadi") {
                Vehicle::where('plat_number', $plat_number)->update([
                    "is_ready" => false
                ]);
            }
        }

        return redirect()->route('/')->with('success', "berhasil membuat pengajuan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if ($id == "mdr") {
            $v_orders = VehicleOrder::where('to_' . $id, 1)
                ->where('approved_' . $id, "!==", true)
                ->where('is_reject', false)
                ->get();
        } elseif ($id == "spv") {
            $v_orders = VehicleOrder::where('to_' . $id, 1)
                ->where('approved_' . $id, "!=", true)
                ->where('approved_mdr', true)
                // ->where('is_reject', false)
                ->get();
        } elseif ($id == "hrd") {
            $v_orders = VehicleOrder::where('to_' . $id, 1)
                ->where('approved_' . $id, false)
                ->where('is_reject', false)
                ->where(function ($query) {
                    $query->where('approved_mdr', true)
                        ->orWhere('approved_spv', true);
                })
                ->get();
        }

        return view('backend.menunngu-persetujuan', ['orders' => $v_orders]);
    }

    public function approvedBySupperior()
    {
        $v_orders = VehicleOrder::where('is_approve', 1)->where('finish', false)->get();
        return view('backend.V-approved', ['orders' => $v_orders]);
    }
    public function rejectBySupperior()
    {
        $v_orders = VehicleOrder::where('is_reject', true)->get();
        return view('backend.V-reject', ['orders' => $v_orders]);
    }

    public function showAcc(string $id)
    {
        $v_orders = VehicleOrder::where('approved_' . $id, 1)->get();
        return view('backend.menunngu-persetujuan', ['orders' => $v_orders]);
    }

    public function approveMdr($id)
    {
        VehicleOrder::where('id', $id)->update(['approved_mdr' => true]);
        return redirect()->back()->with('success', 'disetujui');
    }

    public function approveSpv($id)
    {
        VehicleOrder::where('id', $id)->update(['approved_spv' => true]);
        $order = VehicleOrder::where('id', $id)->first();
        if ($order->approved_mdr == true) {
            if ($order->approved_spv == true) {
                VehicleOrder::where('id', $id)->update(['is_approve' => true]);
            }
        }
        return redirect()->back()->with('success', 'disetujui');
    }
    public function approveHrd($id)
    {
        VehicleOrder::where('id', $id)->update(['approved_hrd' => true]);
        $order = VehicleOrder::where('id', $id)->first();
        if ($order->approved_mdr == true || $order->approved_spv == true) {
            if ($order->approved_hrd == true) {
                VehicleOrder::where('id', $id)->update(['is_approve' => true]);
            }
        }

        return redirect()->back()->with('success', 'disetujui');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function finishOrder(string $id)
    {
        $order = VehicleOrder::where('id', $id)->first();
        return view('backend.V-finish', ['order' => $order]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        VehicleOrder::where('id', $id)->update(['is_reject' => true]);
        return redirect()->back()->with('wrong', 'ditolak');
    }
}
