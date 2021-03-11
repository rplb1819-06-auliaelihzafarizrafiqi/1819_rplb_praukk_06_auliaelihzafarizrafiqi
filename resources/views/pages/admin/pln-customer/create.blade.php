@extends('layouts.admin')

@section('title', 'Tambah Pelanggan')

@section('content')
  <div class="container">
    <h3 class="mb-4">Tambah Pelanggan</h3>
    <div class="card">
      <div class="card-body">
      <form action="{{route('admin.pln-customers.store')}}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNama">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" class="form-control @error('nama_pelanggan')
            is-invalid    
            @enderror" id="inputNama" value="{{old('nama_pelanggan')}}" placeholder="Masukkan nama">
            @error('nama_pelanggan')
              <span class="invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="inputNoMeter">No. Meter / ID Pelanggan</label>
            <input type="text" name="nomor_meter" class="form-control @error('nomor_meter')
            is-invalid    
            @enderror" id="inputNoMeter" value="{{old('nomor_meter')}}" placeholder="Contoh: 537320018426">
            @error('nomor_meter')
              <span class="invalid-feedback">{{$message}}</span>   
            @enderror
          </div>
        </div>
        <div class="form-group">
          <label for="inputAlamat">Alamat</label>
          <textarea name="alamat" class="form-control @error('alamat')
            is-invalid   
          @enderror" id="inputAlamat" placeholder="Masukkan alamat">{{old('alamat')}}</textarea>
          @error('alamat')
            <span class="invalid-feedback">{{$message}}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="selectGolonganTarif">Golongan Tarif</label>
          <select name="id_tarif" class="form-control @error('id_tarif')
            is-invalid   
          @enderror" id="selectGolonganTarif">
            <option selected>Pilih Golongan Tarif</option>
            @foreach($tariffs as $tariff)
              <option value="{{$tariff->id}}" {{$tariff->id === old('id_tarif') ? 'selected' : ''}}>{{$tariff->golongan_tarif}}</option>
            @endforeach
          </select>
          @error('id_tarif')
            <span class="invalid-feedback">{{$message}}</span>    
          @enderror
        </div>
        <a href="{{route('admin.pln-customers.index')}}" class="btn btn-danger">Batal</a>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>
  </div>
@endsection

@push('addon-script')
<script>

</script>
@endpush