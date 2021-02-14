@extends('layouts.admin')

@section('title', 'Pembayaran')

@section('content')
<div class="container mb-3">
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Perhatian!</strong> data yang digunakan dibawah ini adalah data bohongan semua.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <h3 class="mb-4">Pembayaran</h3>
  <div class="card">
    <div class="card-body">
      <table class="table table-striped table-bordered w-100" id="payments">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Customer</th>
            <th>Nama Pelanggan PLN</th>
            <th>ID Tagihan</th>
            <th>Tanggal Bayar</th>
            <th>Status</th>
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
    $('#payments').DataTable({
        responsive: true,
        serverSide: true,
        ajax: "",
        columns: [
            {data: 'id'},
            {data: 'user.nama'},
            {data: 'pln_customer.nama_pelanggan'},
            {data: 'id_tagihan'},
            {data: 'tanggal_bayar'},
            {data: 'status',
              render: function(data, type, row){
                let state;
                if(data == 'success'){
                  state = 'success';
                }else if(data == 'pending'){
                  state = 'warning';
                }else{
                  state = 'danger';
                }
                return `<span class='badge badge-pill 
                        badge-${state}'>${data}</span>`;
              }
            },
            {data: 'action', searchable: false, orderable: false},
        ]
    });
  </script>
@endpush