@extends('layouts.dashboard')
@push('java-script')
    <link rel="stylesheet" href="{{ asset('') }}assets/css/pages/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/pages/datatables.css">
@endpush
@section('conten')
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data mobil PT. Tarik Tambang yang harus diservice hari ini
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Plat Nomor Kendaraan</th>
                            <th>Jenis Kendaraan</th>
                            <th>Merk</th>
                            <th>Keterangan</th>
                            <th>Tanggal</td>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <td>{{ $data->plat_number }}</td>
                                <td>{{ $data->vehicle_type }}</td>
                                <td>{{ $data->merk }}</td>
                                <td>Jatuh Tempo Service Rutin</td>
                                <td>{{ date('Y-m-') . $data->service_routine }}</td>
                                <td><a href="{{ route('vehicle.edit', $data->id) }}" class="btn btn-primary" ><i
                                            class="fas fa-wrench"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
@push('javascript-btm')
    <script src="{{ asset('') }}assets/extensions/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('') }}assets/js/pages/datatables.js"></script>
@endpush
