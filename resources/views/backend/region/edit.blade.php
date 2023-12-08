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
                    <h3>Edit Data Region</h3>
                    <p class="text-subtitle text-muted">Edit data region yang ada</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.region') }}">Data Region</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Data Region</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Lakukan perubahan dan simpan data</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="{{ route('region.update', $region->id) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="city_name">City Name</label>
                                                <input type="text" id="city_name" class="form-control" placeholder="Enter City Name" name="city_name" value="{{ $region->city_name }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="regency">Regency</label>
                                                <input type="text" id="regency" class="form-control" placeholder="Enter Regency" name="regency" value="{{ $region->regency }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="province">Province</label>
                                                <input type="text" id="province" class="form-control" placeholder="Enter Province" name="province" value="{{ $region->province }}" required>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1"><i class="bi bi-check"></i> Submit</button>
                                            <a href="{{ route('backend.region') }}" class="btn btn-light-secondary me-1 mb-1"><i class="bi bi-x"></i> Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Basic multiple Column Form section end -->
    </div>
</div>
@endsection