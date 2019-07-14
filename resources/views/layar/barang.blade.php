@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="wrap">
<div class="blog">
<div class="conteudo">
			<table class="table table-hover">
            <thead>
				
					<tr>
						<th>Id</th>
						<th>Barang</th>
						<th>Gambar</th>
            			<th>Harga</th>
						<th>Jumlah</th>
            			<th>Total</th>
						
						<th>Action</th>
						
				</thead>
				
			</table>
            <!-- modal -->
<div class="modal modal-default fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Edit Barang</h4>
      </div>
      <div class="modal-body">
        


      		<form role="form" action="{{ url('data/insert/rekam_medis') }}" method="POST">
      			{{ csrf_field() }}
            
              <div class="box-body">
            	<div class="form-group">
                  <label for="exampleInputEmail1">id</label>
                  <input type="text" name="id" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                </div>
			  
			  <div class="form-group">
                  <label for="exampleInputEmail1">Barang</label>
                  <input type="text" name="barang" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
				</div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Gambar</label>
                  <input type="text" name="gambar" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
				</div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Harga</label>
                  <input type="text" name="harga" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
				</div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Jumlah</label>
                  <input type="text" name="jumlah" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
				</div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Total</label>
                  <input type="text" name="total" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                </div>
			  </div>
			  		
							
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-fw fa-cart-plus"></i> Update</button>
              </div>
            </form>



      </div>
    </div>
    <!-- /.modal-content -->
  </div>
</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

	function validateForm() {
		var x = document.forms["formKu"]["id_barang"]["barang"]["jumlah"]["harga"]["jumlah"]["id_kategori"]["id_status"].value;
		if (x == ""){
			alert("form harus di isi")
			return false;
		}
	}

		$('.table-hover').DataTable({
			processing: true,
	        serverSide: true,
				ajax: "{{url('data/barang')}}",
				columns: [
					{data : 'id', name: 'id' },
					{data : 'barang', name: 'barang' },
					{data : 'gambar', name: 'gambar'},
					{data : 'harga', name: 'harga'},
					{data : 'jumlah', name: 'jumlah'},
					{data : 'total', name: 'total'},
					{data : 'action', name: 'action' , orderable: false, searchable: false}
				],
			order: [ [0, 'asc'] ]	

		});

			
		$('body').on('click','.btn-edit',function(e){
	    	var id = $(this).attr('id-barang');
	    	$.ajax({
				'type':'get',
				'url':"{{url('edit/data/barang')}}"+'/'+id,
				success: function(data){
					console.log(data)
					$('#modal-edit').find("input[name='id']").val(data.id_barang);
					$('#modal-edit').find("input[name='barang']").val(data.barang);
					$('#modal-edit').find("input[name='harga']").val(data.harga);
					$('#modal-edit').find("input[name='gambar']").val(data.gambar);
					$('#modal-edit').find("input[name='total']").val(data.total);
					$('#modal-edit').find("input[name='jumlah']").val(data.jumlah);
					
				}
			})
			
			

	    	$('#modal-edit').modal();
		})
		
</script>
@endsection