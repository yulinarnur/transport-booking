@extends('backend.layout.template')

@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Data Pemesanan Transport</h3>
                    <p class="text-subtitle text-muted">Multiple form layout you can use</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Data Pemesanan Transport</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Pemesanan Transport</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Multiple Column</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('transport_booked.store') }}" method="POST">
                                    @csrf
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="transport_id">Pilih Kendaraan</label>
                                            <select id="transport_id" class="form-control" name="transport_id">
                                                <option value="" disabled selected> Pilih Kendaraan </option>
                                                @foreach(App\Models\Transport::all() as $transport)
                                                    <option value="{{ $transport->id }}">{{ $transport->name }} - Jenis {{ $transport->transport_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="booked_date">Tanggal Pemesanan</label>
                                            <input type="date" id="booked_date" class="form-control" name="booked_date" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select id="status" class="form-control" name="status">
                                                <option value="Menunggu disetujui">Menunggu disetujui</option>
                                                @if(auth()->user()->isApprover())
                                                    <option value="Disetujui">Disetujui</option>
                                                    <option value="Ditolak">Ditolak</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="driver_id">Pilih Driver</label>
                                            <select id="driver_id" class="form-control" name="driver_id" required>
                                                <option value="" disabled selected> Pilih Driver </option>
                                                @foreach(App\Models\Driver::all() as $driver)
                                                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="approver_id">Pilih Persetujuan</label>
                                            <select id="approver_id" class="form-control" name="approver_id" required>
                                                <option value="" disabled selected> Pilih Pengguna yang Menyetujui </option>
                                                @foreach(App\Models\User::approvers() as $approver)
                                                    <option value="{{ $approver->id }}">{{ $approver->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection