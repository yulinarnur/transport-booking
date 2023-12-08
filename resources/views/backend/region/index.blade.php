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
                    <h3>Data Region</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}"><i class="bi bi-house-door"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-table"></i> DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                @if(session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                </div>
                @endif
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="bi bi-table"></i> Daftar Data Region</span>
                    <a class="btn btn-sm btn-primary" href="{{ route('backend.regionAdd') }}"><i class="bi bi-plus"></i> Add Region</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th><i class="bi bi-building"></i> Nama Kota</th>
                                    <th><i class="bi bi-geo-alt"></i> Daerah</th>
                                    <th><i class="bi bi-flag"></i> Provinsi</th>
                                    <th><i class="bi bi-tools"></i> Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($regions as $region)
                                <tr>
                                    <td>{{ $region->city_name }}</td>
                                    <td>{{ $region->regency }}</td>
                                    <td>{{ $region->province }}</td>
                                    <td>
                                        <a href="{{ route('region.edit', $region->id) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil"></i> Edit</a>
                                        <form action="{{ route('region.destroy', $region->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection