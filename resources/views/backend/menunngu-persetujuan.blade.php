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
                Simple Datatable
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Plat Nomor Kendaraan</th>
                            <th>Pemilik Kendaraan</th>
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
                                <td>{{ $order->travel_start }}</td>
                                <td>{{ $order->travel_destinations }}</td>
                                <td>{{ $order->description }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if (Auth::user()->position == 'mdr')
                                                @php
                                                    $route = route('vehicle-order.mdr', $order->id);
                                                @endphp
                                            @elseif (Auth::user()->position == 'spv')
                                                @php
                                                    $route = route('vehicle-order.spv', $order->id);
                                                @endphp
                                            @elseif (Auth::user()->position == 'hrd')
                                                @php
                                                    $route = route('vehicle-order.hrd', $order->id);
                                                @endphp
                                            @endif
                                            <form action="{{ $route }}" method="POST">
                                                @csrf @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-success">Accept</button>
                                            </form>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{ route('vehicle-order.destroy', $order->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                                            </form>
                                        </div>
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
    {{-- <script src="{{ asset('') }}assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="{{ asset('') }}assets/js/pages/simple-datatables.js"></script> --}}
    <script src="{{ asset('') }}assets/extensions/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('') }}assets/js/pages/datatables.js"></script>
@endpush
