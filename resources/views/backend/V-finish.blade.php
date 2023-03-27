@extends('layouts.dashboard')
@push('java-script')
    <link rel="stylesheet" href="{{ asset('') }}assets/css/pages/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/pages/datatables.css">
@endpush
@section('conten')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Laporan Kendaraan Kembali</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('v-history.create') }}" method="POST">
                                @csrf
                                <h4>Kendaraan dengan nopol ({{ $order->plat_number }})</h4>
                                <input type="hidden" name="start_rute" value="{{ $order->travel_start }}">
                                <input type="hidden" name="destination" value="{{ $order->travel_destinations }}">
                                <input type="hidden" name="date_start" value="{{ $order->updated_at }}">
                                <input type="hidden" name="plat_number" value="{{ $order->plat_number }}">
                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Konsumsi bahan bakar</label>
                                            <input type="text"
                                                class="form-control @error('fuel_consums') is-invalid @enderror"
                                                placeholder="misal : 2liter" value="{{ old('fuel_consums') }}"
                                                name="fuel_consums">
                                            @error('fuel_consums')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Deskripsi</label>
                                            <input type="text"
                                                class="form-control @error('description') is-invalid @enderror"
                                                placeholder="misal: baik" value="{{ old('description') }}"
                                                name="description">
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('javascript-btm')
    <script src="{{ asset('') }}assets/extensions/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('') }}assets/js/pages/datatables.js"></script>
@endpush
