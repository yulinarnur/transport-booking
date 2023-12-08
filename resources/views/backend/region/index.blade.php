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
            @endif
            <div class="card-header d-flex justify-content-between align-items-center">
              Simple Datatable
              <a class="btn btn-primary" href="{{ route('backend.regionAdd') }}">Add</a>
            </div>
              <div class="card-body">
                  <table class="table table-striped" id="table1">
                    <thead>
                      <tr>
                        <th>Nama Kota</th>
                        <th>Daerah</th>
                        <th>Provinsi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($regions as $region)
                          <tr>
                            <td>{{ $region->city_name }}</td>
                            <td>{{ $region->regency }}</td>
                            <td>{{ $region->province }}</td>
                            <td>
                              <a href="{{ route('region.edit', $region->id) }}" class="btn btn-primary">Edit</a>
                              <form action="{{ route('region.destroy', $region->id) }}" method="POST" style="display:inline;">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
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