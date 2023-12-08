@extends('backend.layout.template')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Detail Persetujuan</h2>
            <hr>

            <div class="card-text">
                <!-- Detail kendaraan -->
                <div class="row">
                    <div class="col-md-3">
                        <strong>Nama Kendaraan:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $agreement->transport->name }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <strong>No Polisi:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $agreement->transport->no_pol }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <strong>Jenis Kendaraan:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $agreement->transport->transport_type }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <strong>Tanggal Pesan:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $agreement->booked_date }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <strong>Nama Driver:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $agreement->driver ? $agreement->driver->name : '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <strong>Status:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $agreement->status }}
                    </div>
                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-end align-items-center">
                <form action="{{ route('agreement.approve', $agreement->id) }}" method="POST" class="me-2">
                    @csrf
                    <button type="submit" class="btn btn-success" {{ $agreement->status != 'Menunggu disetujui' ? 'disabled' : '' }}>
                        <i class="fas fa-check-circle me-1"></i> Disetujui
                    </button>
                </form>

                <form action="{{ route('agreement.reject', $agreement->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger" {{ $agreement->status != 'Menunggu disetujui' ? 'disabled' : '' }}>
                        <i class="fas fa-times-circle me-1"></i> Ditolak
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection