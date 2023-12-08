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
                    <h3><i class="fas fa-user-plus me-2"></i>Form Data Driver</h3>
                    <p class="text-subtitle text-muted">Isi dan Simpan Data</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.driver') }}"><i class="fas fa-table me-1"></i>Data Driver</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Data Driver</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><i class="fas fa-columns me-2"></i>Tambah Data</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('driver.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name"><i class="fas fa-user me-1"></i>Nama Driver</label>
                                                <input type="text" id="name" class="form-control" placeholder="Nama Driver" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nik"><i class="fas fa-id-card me-1"></i>NIK</label>
                                                <input type="text" id="nik" class="form-control" placeholder="NIK" name="nik" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_telp"><i class="fas fa-phone me-1"></i>Nomor Telepon</label>
                                                <input type="text" id="no_telp" class="form-control" placeholder="Nomor Telepon" name="no_telp" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="birth_date"><i class="fas fa-calendar-alt me-1"></i>Tanggal Lahir</label>
                                                <input type="date" id="birth_date" class="form-control" name="birth_date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="gender"><i class="fas fa-venus-mars me-1"></i>Jenis Kelamin</label>
                                                <select id="gender" class="form-control" name="gender">
                                                    <option value="male">Laki-laki</option>
                                                    <option value="female">Perempuan</option>
                                                    <option value="other">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="work_start_date"><i class="fas fa-calendar-check me-1"></i>Tanggal Mulai Bekerja</label>
                                                <input type="date" id="work_start_date" class="form-control" name="work_start_date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="status"><i class="fas fa-check-circle me-1"></i>Status</label>
                                                <select id="status" class="form-control" name="status">
                                                    <option value="active">Aktif</option>
                                                    <option value="non-active">Non-Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="address"><i class="fas fa-map-marker-alt me-1"></i>Alamat</label>
                                                <textarea id="address" class="form-control" name="address" rows="3" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1"><i class="fas fa-check me-1"></i>Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1"><i class="fas fa-undo me-1"></i>Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic multiple Column Form section end -->
    </div>
</div>
@endsection