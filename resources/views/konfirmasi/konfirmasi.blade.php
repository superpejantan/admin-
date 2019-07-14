@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="blog">
	<div class="conteudo">
		<table class="table table-hover">
			<thead>
				<tr>
					
					<th>Penerima</th>
					<th>Alamat</th>
					<th>Total Bayar</th>
					<th>Nama Bank</th>
					<th>Status</th>
					<th>Tanggal Pembayaran</th>
					<th>Proses</th>
			</thead>
			
		</table>
	</div>
	<!-- modal -->
<div class="modal modal-default fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Verifikasi Pembayaran</h4>
      </div>
      <div class="modal-body">
        


      		<form role="form" action="{{ url('data/insert/konfirmasi') }}" method="POST">
      			{{ csrf_field() }}
            
              <div class="box-body">
              <input type="text" name="id" class="form-control" id="exampleInputEmail1">
            <div class="form-group">
                  <label for="exampleInputEmail1">Konfirmasi</label>
                  <select name="id_status" id="status" class="form-control" placeholder="nama dokter" required>
                    @foreach($verifikasi as $c)
                    <option value="{{ $c->id_status }}">{{ $c->status }}</option>
                    @endforeach
                  </select>
                </div>

              </div>
					<input type="hidden" name="id">
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-fw fa-cart-plus"></i> Update</button>
              </div>
            </form>



      </div>
    </div>
    <!-- /.modal-content -->
</div>

@endsection

@section('scripts')
<script type="text/javascript">

	$('.table-hover').DataTable({
		processing: true,
		serverSide: true,
				ajax: "{{url('data/barang/konfirmasi')}}",
				columns: [
					{data: 'penerima', name: 'penerima'},
					{data: 'alamat', name: 'alamat'},
					{data: 'total', name: 'total'},
					{data: 'transfer', name: 'transfer'},
					{data: 'status', name: 'status'},
					{data: 'tanggal', name: 'tanggal'},
					{data: 'action', name: 'action', orderable:false, searchable:false}
				],
		order: [ [0, 'asc'] ]	

	});

	$('body').on('click','.btn-edit',function(e){
	    	var id = $(this).attr('id-pesanan');
	    	$.ajax({
				'type': 'get',
				'url':"{{url('get/data/pesanan')}}"+'/'+id,
				
				success: function(data){
					console.log(data)
					$('#modal-edit').find("input[name='id']").val(data.id);
					
				}
			})
			
			

	    	$('#modal-edit').modal();
		})
	

	


	
</script>
@endsection