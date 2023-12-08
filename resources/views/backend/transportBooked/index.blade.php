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
                  <h3>Data Pemesanan Kendaraan</h3>
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
                <span><i class="bi bi-truck"></i> Daftar Data Pemesanan Kendaraan</span>
              <a class="btn btn-sm btn-primary" href="{{ route('backend.transportAddBooked') }}"><i class="fas fa-plus me-2"></i> Add Transportion Booked</a>
            </div>
              <div class="card-body">
                  <table class="table table-striped" id="table1">
                    <thead>
                      <tr>
                        <th>Nama Kendaraan</th>
                        <th>No Polisi</th>
                        <th>Jenis Kendaraan</th>
                        <th>Tanggal Pesan</th>
                        <th>Nama Driver</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($transportBookeds as $transportBooks)
                          <tr>
                            <td>{{ $transportBooks->transport->name }}</td>
                            <td>{{ $transportBooks->transport->no_pol }}</td>
                            <td>{{ $transportBooks->transport->transport_type }}</td>
                            <td>{{ $transportBooks->booked_date }}</td>
                            <td>{{ $transportBooks->driver ? $transportBooks->driver->name : "-" }}</td>
                            <td>
                                @if($transportBooks->status == 'Menunggu disetujui')
                                    <span class="badge bg-warning">{{ $transportBooks->status }} - {{ $transportBooks->approver->name }}</span>
                                @elseif($transportBooks->status == 'Disetujui')
                                    {{ $transportBooks->status }} - {{ $transportBooks->approver->name }}
                                @elseif($transportBooks->status == 'Ditolak')
                                    <span class="badge bg-danger">{{ $transportBooks->status }} - {{ $transportBooks->approver->name }}</span>
                                @else
                                    {{ $transportBooks->status }} - {{ $transportBooks->approver->name }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('transport_booked.edit', $transportBooks->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('transport_booked.destroy', $transportBooks->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash-alt"></i> Delete
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