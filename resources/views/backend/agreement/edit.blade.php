@extends('backend.layout.template')

@section('content')
<div class="agree-container">
    <h2>Data Persetujuan</h2>
    <hr>
    
    <div class="agree-detail">
        <p><strong>Nama Kendaraan:</strong> {{ $agreement->transport->name }}</p>
        <p><strong>No Polisi:</strong> {{ $agreement->transport->no_pol }}</p>
        <p><strong>Jenis Kendaraan:</strong> {{ $agreement->transport->transport_type }}</p>
        <p><strong>Tanggal Pesan:</strong> {{ $agreement->booked_date }}</p>
        <p><strong>Nama Driver:</strong> {{ $agreement->driver ? $agreement->driver->name : '-' }}</p>
        <p><strong>Status:</strong> {{ $agreement->status }}</p>
    </div>
    
    <hr>
    <div class="actions">
        <form action="{{ route('agreement.approve', $agreement->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success" {{ $agreement->status != 'Menunggu disetujui' ? 'disabled' : '' }}>Disetujui</button>
        </form>
        
        <form action="{{ route('agreement.reject', $agreement->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger" {{ $agreement->status != 'Menunggu disetujui' ? 'disabled' : '' }}>Ditolak</button>
        </form>
    </div>
    
    
</div>

<style>
.agree-container {
    max-width: 600px;
    margin: auto;
    background-color: #fff;
    padding: 20px;
    border: 1px solid #e0e0e0;
    border-radius: 8px;
}

.agree-detail p {
    margin-bottom: 10px;
}

.actions {
    display: flex;
    justify-content: flex-end; 
    gap: 10px;
}
</style>

@endsection