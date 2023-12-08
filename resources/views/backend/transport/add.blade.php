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
                    <h3><i class="bi bi-file-earmark-plus"></i> Form Data Transport</h3>
                    <p class="text-subtitle text-muted">Multiple form layout you can use</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}"><i class="bi bi-house-door"></i> Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.transport') }}">Data Transport</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Data Transport</li>
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
                            <h4 class="card-title">
                                <i class="bi bi-file-earmark-plus"></i> Form Data Transport
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('transport.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name">Nama Kendaraan</label>
                                                <input type="text" id="name" class="form-control" placeholder="Nama Kendaraan" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name">No Polisi</label>
                                                <input type="text" id="no_pol" class="form-control" placeholder="No Polisi" name="no_pol" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="transport_type">Tipe Kendaraan</label>
                                                <select id="transport_type" class="form-control" name="transport_type">
                                                    <option value="Angkutan Orang">Angkutan Orang</option>
                                                    <option value="Angkutan Barang">Angkutan Barang</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="company_id">Perusahaan (Jika status 'Sewa')</label>
                                                <select id="company_id" class="form-control" name="company_id">
                                                    <option value="" disabled selected> Pilih Perusahaan </option>
                                                    @foreach(App\Models\Companies::all() as $company)
                                                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select id="status" class="form-control" name="status">
                                                    <option value="Hak Milik">Hak Milik</option>
                                                    <option value="Sewa">Sewa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="bbm_consume">Konsumsi BBM</label>
                                                <input type="text" id="bbm_consume" class="form-control" placeholder="Konsumsi BBM" name="bbm_consume" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="service_schedule">Jadwal Servis</label>
                                                <input type="datetime-local" id="service_schedule" class="form-control" name="service_schedule" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="image">Gambar Kendaraan</label>
                                                <input type="file" id="image" class="form-control" name="image">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                <i class="bi bi-check2"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                <i class="bi bi-x"></i> Reset
                                            </button>
                                        </div>
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
</div>
@endsection