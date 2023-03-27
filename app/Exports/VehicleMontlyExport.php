<?php

namespace App\Exports;

use App\Models\VehicleUseHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class VehicleMontlyExport implements FromCollection, WithMapping, ShouldAutoSize, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return VehicleUseHistory::join('vehicles', 'vehicle_use_histories.vehicle_id', '=', 'vehicles.id')
            ->join('vehicle_orders', 'vehicle_use_histories.vehicle_order_id', '=', 'vehicle_orders.id')
            ->where('vehicle_use_histories.created_at', '>=', date('Y-m-d', strtotime('-1 month')))
            ->select('vehicle_use_histories.*', 'vehicles.*', 'vehicle_orders.*')
            ->get();
    }

    public function map($user): array
    {
        return [
            "",
            $user->plat_number,
            $user->vehicle_owner,
            $user->description,
            $user->start_rute,
            $user->destination,
            $user->date_start . ' -- ' . $user->date_finish,
            $user->fuel_consums,
            $user->driver
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Plat nomor',
            'Kendaraan milik',
            'Penggunaan',
            'Tempat awal',
            'Tempat tujuan',
            'Digunkapan pada',
            'Konsumsi BBM',
            'Sopir'
        ];
    }
}
