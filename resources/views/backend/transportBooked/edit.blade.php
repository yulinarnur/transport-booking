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
                    <h3>Form Edit Data Driver</h3>
                    <p class="text-subtitle text-muted">Multiple form layout you can use</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Data Driver</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Edit Data Driver</li>
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
                            <h4 class="card-title">Multiple Column</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('driver.update', $driver->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name">Nama Driver</label>
                                                <input type="text" id="name" class="form-control" placeholder="Nama Driver" name="name" value="{{ $driver->name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input type="text" id="nik" class="form-control" placeholder="NIK" name="nik" value="{{ $driver->nik }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_telp">Nomor Telepon</label>
                                                <input type="text" id="no_telp" class="form-control" placeholder="Nomor Telepon" name="no_telp" value="{{ $driver->no_telp }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="birth_date">Tanggal Lahir</label>
                                                <input type="date" id="birth_date" class="form-control" name="birth_date" value="{{ $driver->birth_date->format('Y-m-d') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select id="gender" class="form-control" name="gender">
                                                    <option value="male" {{ $driver->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="female" {{ $driver->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                                                    <option value="other" {{ $driver->gender == 'other' ? 'selected' : '' }}>Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="work_start_date">Tanggal Mulai Bekerja</label>
                                                <input type="date" id="work_start_date" class="form-control" name="work_start_date" value="{{ $driver->work_start_date->format('Y-m-d') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="address">Alamat</label>
                                                <textarea id="address" class="form-control" name="address" rows="3" required>{{ $driver->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select id="status" class="form-control" name="status">
                                                    <option value="active" {{ $driver->status == 'active' ? 'selected' : '' }}>Aktif</option>
                                                    <option value="non-active" {{ $driver->status == 'non-active' ? 'selected' : '' }}>Non-Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
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
        <!-- // Basic multiple Column Form section end -->
    </div>
</div>
@endsection