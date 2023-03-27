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
                Data mobil PT. Tarik Tambang
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Plat Nomor Kendaraan</th>
                            <th>Pemilik Kendaraan</th>
                            <th>Jenis Kendaraan</th>
                            <th>Merk Kendaraan</th>
                            <th>Sedang Digunakan</th>
                            <th>Service</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->plat_number }}</td>
                                <td>PT.Tarik Tambang</td>
                                <td>{{ $data->vehicle_type }}</td>
                                <td>{{ $data->merk }}</td>
                                <td>
                                    @if (!$data->is_ready)
                                        <i class="fas fa-check"></i>
                                    @else
                                        <i class="fas fa-times"></i>
                                    @endif
                                </td>
                                <td>
                                    @if ($data->is_service)
                                        <i class="fas fa-check"></i>
                                    @else
                                        <i class="fas fa-times"></i>
                                    @endif
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
