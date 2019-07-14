@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="wrap">
<div class="blog">
<div class="conteudo">
			<table class="table table-hover">
            <thead>
				
					<tr>
						<th>Nama Penerima</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
						<th>Action</th>
						
				</thead>
				
			</table>
            <!-- modal -->

    <!-- modal 2 -->
    
    <!-- /.modal-content -->
<div class="modal modal-default fade" id="myModal">
  <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Barang</h4>
            </div>
            <div class="modal-body"> 
            <table class="table table-bordered">
        	<thead>
        		<tr>
	        		<th>
	        			#
	        		</th>
	        		<th>
	        			Nama Barang
	        		</th>
	        		<th>
	        			Qty
	        		</th>
	        		<th>
	        			SubTotal
	        		</th>
	        	</tr>
        	</thead>
        	<tbody id="detail-pesanan">
        		
        	</tbody>
        </table>
                
            </div>
        </div>
    </div>
</div>
</div>
<!-- modal 2 -->
<div class="modal modal-default fade" id="modal-paket">
  <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Barang</h4>
            </div>
            <div class="modal-body"> 
            <div class="box-body">
            	<div class="form-group">
                  <label for="exampleInputEmail1">Paket</label>
                  <input type="text" name="paket" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                </div>
			  
			  <div class="form-group">
                  <label for="exampleInputEmail1">Biaya</label>
                  <input type="text" name="biaya" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Estimasi Waktu</label>
                  <input type="text" name="waktu" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                </div>
            </div>
                
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@section('scripts')


	
<script>
		$('.table-hover').DataTable({
			processing: true,
	        serverSide: true,
				ajax: "{{url('data/pengiriman')}}",
				columns: [
					
					{data : 'penerima', name: 'penerima'},
                    {data : 'alamat', name: 'alamat'},
                    {data : 'telepon', data: 'telepon'},
					{data : 'action', name: 'action' , orderable: false, searchable: false}
				],
			order: [ [0, 'asc'] ]	

		});

			
		$('body').on('click', '.btn-barang', function(){
			var id = $(this).attr('id-barang');

			$.ajax({
				type: 'get',
				url: "{{ url('data/barang/kirim') }}"+'/'+id,
				success: function(data){

					$.each(data.hasil, function(i,v){
						var pesanan = '<tr>';

						pesanan += '<td>';
						pesanan += v.barang;
						pesanan += '</td>';

						pesanan += '<td>';
						pesanan += v.qty;
						pesanan += '</td>';


						pesanan += '</tr>';

						$('#detail-pesanan').append(pesanan);
					});
				}
			});

			$('#myModal').modal();
        });
        
        $('body').on('click','.btn-paket',function(e){
	    	var id = $(this).attr('id-paket');
	    	$.ajax({
                'type':'get',
                'url':"{{url ('data/paket/kirim')}}"+'/'+id,
                success: function(data){
                    console.log(data)
                    $('#modal-paket').find("input[name='paket']").val(data.paket);
                    $('#modal-paket').find("input[name='biaya']").val(data.biaya);
                    $('#modal-paket').find("input[name='waktu']").val(data.waktu);
                }
            })
	    	$('#modal-paket').modal();
		})
		
</script>
@endsection