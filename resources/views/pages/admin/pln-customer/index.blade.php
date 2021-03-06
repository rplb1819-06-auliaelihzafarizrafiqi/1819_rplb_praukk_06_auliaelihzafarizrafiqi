@extends('layouts.admin')

@section('title', 'Pelanggan PLN')

@section('content')
<div class="{{Cookie::get('enable_sidebar') ? 'container-fluid' : 'container'}} mb-3">
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Perhatian!</strong> data yang digunakan dibawah ini adalah data bohongan semua. Dan kemungkinan besar data-datanya tidak saling berhubungan sama sekali, karena dibuat secara acak.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="d-flex justify-content-between mb-4">
    <h3>Pelanggan PLN</h3>
    <a href="{{route('admin.pln-customers.create')}}" class="btn btn-primary-custom">
      <i class="fas fa-plus"></i>
      Tambah
    </a>
  </div>
  <div class="card">
    <div class="card-body">
      <table class="table table-striped table-bordered w-100" id="customers">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Nomor Meter</th>
            <th>Alamat</th>
            <th>Tarif</th>
            <th>Action</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
  <script>
    $('#customers').DataTable({
      responsive: true,
        serverSide: true,
        ajax: "",
        columns: [
            {data: 'id'},
            {data: 'nama_pelanggan'},
            {data: 'nomor_meter'},
            {data: 'alamat',
              render: function ( data, type, row ) {
              return data.length > 30 ?
                data.substr( 0, 30 ) +'…' :
                data;
            }},
            {data: 'tariff.golongan_tarif',
              render: function(data, type, row) {
                return data + '/' + row.tariff.daya + ' VA'
              }
            },
            {data: 'action', searchable: false, orderable: false},
        ],
    });

    $("#customers").on("click.dt", function(e){
      /*cek apakah yang diklik adalah tombol delete, 
      jika true maka tampilkan alert konfirmasi*/
      if($(e.target).hasClass('btn-delete')){
        e.preventDefault();
        Swal.fire({
          title: 'Apakah kamu yakin ingin menghapusnya?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus itu!',
          cancelButtonText: 'Batal',
        }).then((result) => {
          if (result.isConfirmed) {
            $(e.target).parent().submit();
          }
        })
      }
    });
  </script>
@endpush