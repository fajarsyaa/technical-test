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
                Data ini telah disetujui oleh atsan
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Plat Nomor Kendaraan</th>
                            <th>Pemilik Kendaraan</th>
                            <th>Sopir</th>
                            <th>Awal</th>
                            <th>Tujuan</th>
                            <th>Kepentingan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->plat_number }}</td>
                                <td>{{ $order->vehicle_owner }}</td>
                                <td>{{ $order->driver }}</td>
                                <td>{{ $order->travel_start }}</td>
                                <td>{{ $order->travel_destinations }}</td>
                                <td>{{ $order->description }}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{ route('v-finish', $order->id) }}"
                                            class="btn btm-md btn-success">Laporkan
                                            Kembali</a>
                                    </div>
                                </td>
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
