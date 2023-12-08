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
                    <h3>Data Transport</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
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
                    <span><i class="bi bi-table"></i> Daftar Data Kendaraan</span>
                    <a class="btn btn-primary" href="{{ route('backend.transportAdd') }}">
                        <i class="bi bi-plus"></i> Add
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Nama Kendaraan</th>
                                <th>No Polisi</th>
                                <th>Jenis Kendaraan</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Jumlah Konsumsi BBM</th>
                                <th>Jadwal Service</th>
                                <th>Perusahaan Persewaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transports as $transport)
                                <tr>
                                    <td>{{ $transport->name }}</td>
                                    <td>{{ $transport->no_pol }}</td>
                                    <td>{{ $transport->transport_type }}</td>
                                    <td>
                                        @if($transport->status == 'Hak Milik')
                                            <span class="badge bg-success">{{ $transport->status }}</span>
                                        @elseif($transport->status == 'Sewa')
                                            <span class="badge bg-warning">{{ $transport->status }}</span>
                                        @else
                                            {{ $transport->status }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($transport->image)
                                            <img src="{{ asset('storage/' . $transport->image) }}" alt="Transport Image" width="100">
                                        @else
                                            <i class="bi bi-image"></i>
                                        @endif
                                    </td>
                                    <td>{{ $transport->bbm_consume }}</td>
                                    <td>{{ $transport->service_schedule }}</td>
                                    <td>{{ $transport->company ? $transport->company->company_name : '-' }}</td>
                                    <td>
                                        <a href="{{ route('transport.edit', $transport->id) }}" class="btn btn-sm btn-primary">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('transport.destroy', $transport->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection