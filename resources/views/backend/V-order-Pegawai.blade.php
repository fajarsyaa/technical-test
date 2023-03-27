@extends('layouts.dashboard')
@section('conten')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Pengajuan Pemesanan Kendaraan Khusus Pegawai PT. Tarik Tambang
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="{{ route('vehicle-order.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="information" value="pegawai">
                                <div class="row">
                                    <label for="" class="form-label">Pilih salah satu saja, menggunakan mobil
                                        perusahaan atau mobil sewa</label>

                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <a href="" onclick="formVhcPt()"><label for=""
                                                    class="form-label">Form Mobil
                                                    Perusahaan</label></a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="" onclick="formVhcSewa()"><label for=""
                                                    class="form-label">Form Mobil
                                                    Sewa</label></a>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="col-md-6 col-12 form-pengajuan">
                                        <div class="form-group">
                                            <label for="last-name-column" class="form-label">Plat Nomor (Kendaraan milik
                                                PT) (wajib)</label>
                                            <select name="plat_number"
                                                class="form-select form-control @error('plat_number') is-invalid @enderror">
                                                <option value="">-pilih plat nomor-</option>
                                                @foreach ($vehicles as $vehicle)
                                                    <option value="{{ $vehicle->plat_number }}"
                                                        {{ old('plat_number') == $vehicle->plat_number ? 'selected' : '' }}>
                                                        {{ $vehicle->plat_number . ' - ' . $vehicle->vehicle_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('plat_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating" class="form-label">Pilih sopir (wajib)</label>
                                            <select name="driver"
                                                class="form-select form-control @error('driver') is-invalid @enderror">
                                                <option value="">-pilih driver-</option>
                                                @foreach ($drivers as $driver)
                                                    <option value="{{ $driver->name }}"
                                                        {{ old('driver') == $driver->name ? 'selected' : '' }}>
                                                        {{ $driver->name . ' - ' . $driver->identity_number }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('driver')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="country-floating" class="form-label">deskripsi (wajib)</label>
                                            <input type="text" id="country-floating"
                                                class="form-control @error('description') is-invalid @enderror"
                                                value="{{ old('description') }}" name="description"
                                                placeholder="misal : pengiriman nikel dan batu bara">
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Tempat awal mobil (wajib)</label>
                                            <select name="travel_start"
                                                class="form-select form-control @error('travel_start') is-invalid @enderror">
                                                <option value="">-mulai dari-</option>
                                                @foreach ($travel_starts as $start)
                                                    <option value="{{ $start->name }}"
                                                        {{ old('travel_start') == $start->name ? 'selected' : '' }}>
                                                        {{ $start->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('travel_start')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="city-column" class="form-label">Tujuan Mobil (wajib)</label>
                                            <input type="text"
                                                class="form-control @error('travel_destination') is-invalid @enderror"
                                                placeholder="misal : PT.Teman" value="{{ old('travel_destination') }}"
                                                name="travel_destination">
                                            @error('travel_destination')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label class="form-label">Pilih siapa saja yang akan menyetujui Pengajuan ini (wajib
                                            di isi, dengan minimal 2 pilihan
                                        </label>
                                        <div class='form-group'>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-check mandatory">
                                                        <input type="checkbox" id="checkbox1"
                                                            class='form-check-input @error('approver') is-invalid @enderror'
                                                            name="approver[]" value="mdr">
                                                        <label for="checkbox1"
                                                            class="form-check-label form-label">MANDOR</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check mandatory">
                                                        <input type="checkbox" id="checkbox2"
                                                            class='form-check-input @error('approver') is-invalid @enderror'
                                                            name="approver[]" value="spv">
                                                        <label for="checkbox2"
                                                            class="form-check-label form-label">SUPERVISOR</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check mandatory">
                                                        <input type="checkbox" id="checkbox3"
                                                            class='form-check-input @error('approver') is-invalid @enderror'
                                                            name="approver[]" value="hrd">
                                                        <label for="checkbox3   "
                                                            class="form-check-label form-label">HRD</label>
                                                    </div>
                                                </div>
                                                @error('approver[]')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
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
    <script>
        function formVhcPt() {
            event.preventDefault();
            var form = document.querySelector(".form-pengajuan");
            form.innerHTML = `
            <div class="form-group">
                <label for="last-name-column" class="form-label">Plat Nomor (Kendaraan milik
                    PT) (wajib)</label>
                <select name="plat_number" class="form-select form-control  @error('plat_number') is-invalid @enderror">
                    <option value="">-pilih plat nomor-</option>
                    @foreach ($vehicles as $vehicle)
                        <option value="{{ $vehicle->plat_number }}"
                            {{ old('plat_number') == $vehicle->plat_number ? 'selected' : '' }}>
                            {{ $vehicle->plat_number . ' - ' . $vehicle->vehicle_type }}
                        </option>
                    @endforeach
                </select>
                @error('plat_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            `;
        }

        function formVhcSewa() {
            event.preventDefault();
            var form = document.querySelector(".form-pengajuan");
            form.innerHTML = `
            <div class="col-12">
                <div class="form-group">
                    <label for="last-name-column" class="form-label">Plat Nomor (Kendaraan
                        sewa) (wajib)</label>
                    <input type="text"class="form-control @error('plat_number_sewa') is-invalid @enderror"
                        placeholder="plat nomor kendaraan sewa"
                        value="{{ old('plat_number_sewa') }}" name="plat_number_sewa">
                     @error('plat_number_sewa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            `;
        }
    </script>
@endpush
