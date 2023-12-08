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
                    <h3>Data Driver</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('backend.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-table me-2"></i>Daftar Data Driver</span>
                    <a class="btn btn-primary" href="{{ route('backend.driverAdd') }}">
                        <i class="fas fa-plus me-2"></i> Add Driver
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>No. Telp</th>
                                    <th>Tgl Lahir</th>
                                    <th>Gender</th>
                                    <th>Tgl Mulai</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drivers as $driver)
                                <tr>
                                    <td>{{ $driver->name }}</td>
                                    <td>{{ $driver->nik }}</td>
                                    <td>{{ $driver->no_telp }}</td>
                                    <td>{{ $driver->birth_date }}</td>
                                    <td>{{ $driver->gender }}</td>
                                    <td>{{ $driver->work_start_date }}</td>
                                    <td>{{ $driver->address }}</td>
                                    <td>
                                        @if($driver->status == 'active')
                                            <span class="badge bg-success">{{ $driver->status }}</span>
                                        @elseif($driver->status == 'non-active')
                                            <span class="badge bg-warning">{{ $driver->status }}</span>
                                        @else
                                            {{ $driver->status }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-inline">
                                            <a href="{{ route('driver.edit', $driver->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit me-1"></i> 
                                            </a>
                                        </div>
                                        <div class="d-inline">
                                            <form action="{{ route('driver.destroy', $driver->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash-alt me-1"></i> 
                                                </button>
                                            </form>
                                        </div>
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