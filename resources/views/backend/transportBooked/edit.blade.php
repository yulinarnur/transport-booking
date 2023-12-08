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
                    <h3>Edit Data Transport</h3>
                    <p class="text-subtitle text-muted">Perbarui data yang sudah ada</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Data Transport</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Data Transport</li>
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
                            <h4 class="card-title">Edit Transport Data</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('transport_booked.update', $transportBooked->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                        <div class="form-group">
                                            <label for="transport_id">Pilih Kendaraan</label>
                                            <select id="transport_id" class="form-control" name="transport_id">
                                                <option value="" disabled> Pilih Kendaraan </option>
                                                @foreach(App\Models\Transport::all() as $transport)
                                                    <option value="{{ $transport->id }}" {{ $transportBooked->transport_id == $transport->id ? 'selected' : '' }}>
                                                        {{ $transport->name }} - Jenis {{ $transport->transport_type }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="booked_date">Tanggal Pemesanan</label>
                                            <input type="date" id="booked_date" class="form-control" name="booked_date" required value="{{ $transportBooked->booked_date }}">
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select id="status" class="form-control" name="status">
                                                @if($transportBooked->status == 'Menunggu disetujui')
                                                    <option value="Menunggu disetujui" selected>Menunggu disetujui</option>
                                                @elseif($transportBooked->status == 'Disetujui')
                                                    <option value="Disetujui" selected>Disetujui</option>
                                                @elseif($transportBooked->status == 'Ditolak')
                                                    <option value="Ditolak" selected>Ditolak</option>
                                                @endif
                                            </select>
                                        </div>                                  
                    
                                        <div class="form-group">
                                            <label for="driver_id">Pilih Driver</label>
                                            <select id="driver_id" class="form-control" name="driver_id" required>
                                                <option value="" disabled> Pilih Driver </option>
                                                @foreach(App\Models\Driver::all() as $driver)
                                                    <option value="{{ $driver->id }}" {{ $transportBooked->driver_id == $driver->id ? 'selected' : '' }}>
                                                        {{ $driver->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="approver_id">Pilih Persetujuan</label>
                                            <select id="approver_id" class="form-control" name="approver_id" required>
                                                <option value="" disabled> Pilih Pengguna yang Menyetujui </option>
                                                @foreach(App\Models\User::approvers() as $approver)
                                                    <option value="{{ $approver->id }}" {{ $transportBooked->approver_id == $approver->id ? 'selected' : '' }}>
                                                        {{ $approver->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                    
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                <i class="bi bi-check"></i> Update
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                <i class="bi bi-x"></i> Reset
                                            </button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#status').on('change', function(){
            var status = $(this).val();
            if(status == "Hak Milik") {
                $('#company_id').prop('disabled', true);
                $('#company_id').prepend('<option value="" selected>-</option>'); // menambahkan opsi "-"
            } else {
                $('#company_id option[value=""]').remove(); // menghapus opsi "-"
                $('#company_id').prop('disabled', false);
            }
        });
    });
</script>
@endsection
