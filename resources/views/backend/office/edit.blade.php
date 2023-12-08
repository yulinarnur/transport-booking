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
                    <h3><i class="bi bi-file-earmark-text"></i> Form Edit Data Kantor</h3>
                    <p class="text-subtitle text-muted">Edit data kantor yang sudah ada</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.office') }}"><i class="bi bi-house-door"></i> Data Region</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-file-earmark-text"></i> Form Edit Data Region</li>
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
                            <h4 class="card-title"><i class="bi bi-layout-text-window-reverse"></i> Edit</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('office.update', $office->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="office_type">Jenis Kantor</label>
                                                <select id="office_type" class="form-control" name="office_type" required>
                                                    <option value="Kantor Cabang" {{ $office->office_type == 'Kantor Cabang' ? 'selected' : '' }}>Kantor Cabang</option>
                                                    <option value="Kantor Pusat" {{ $office->office_type == 'Kantor Pusat' ? 'selected' : '' }}>Kantor Pusat</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="region_id">Region</label>
                                                <select id="region_id" class="form-control" name="region_id" required>
                                                    @foreach($regions as $region)
                                                        <option value="{{ $region->id }}" {{ $office->region_id == $region->id ? 'selected' : '' }}>{{ $region->city_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="address">Alamat</label>
                                                <textarea id="address" class="form-control" name="address" required>{{ $office->address }}</textarea>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1"><i class="bi bi-check"></i> Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1"><i class="bi bi-x"></i> Reset</button>
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
</div>
@endsection