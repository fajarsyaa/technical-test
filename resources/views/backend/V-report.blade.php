@extends('layouts.dashboard')
@push('java-script')
    <link rel="stylesheet" href="{{ asset('') }}assets/css/pages/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/pages/datatables.css">
@endpush
@section('conten')
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="{{ route('v-history.exportWeekExcel') }}">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="fas fa-file-download"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Laporan Mingguan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="{{ route('v-history.exportMontExcel') }}">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="fas fa-file-download"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Laporan Bulanan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Pemakaian Kendaraan</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Tanggal digunakan</td>
                                            <th>Tanggal selesai</td>
                                            <th>Plat Nomor Kendaraan</th>
                                            <th>Keterangan</th>
                                            <th>Tujuan</th>
                                            <th>Konsumsi BBM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $data)
                                            <tr>
                                                <td>{{ $data->date_start }}</td>
                                                <td>{{ $data->date_finish }}</td>
                                                <td>{{ $data->plat_number }}</td>
                                                <td>{{ $data->description }}</td>
                                                <td>{{ $data->destination }}</td>
                                                <td>{{ $data->fuel_consums }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('javascript-btm')
    <script src="{{ asset('') }}assets/extensions/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('') }}assets/js/pages/datatables.js"></script>
@endpush
