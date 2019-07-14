@extends('layouts.app')
@section('content')
<body>
<div class="container">
    <h3><span class="glyphicon glyphicon-briefcase"></span>  Data Barang</h3>
    <button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" 
        class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Barang</button>
			

			


			<table class="table table-striped">
            <thead>
				
					<tr>
						<th>Id</th>
						<th>Barang</th>
						<th>Netto</th>
						<th>Jumlah</th>
                        <th>Harga</th>
                        <th>Jenis</th>
						<th>Action</th>
						
				</thead>
				<tbody>
					
					@foreach($barang as $brg)
					
					
						<td>{{$brg->id_barang}}</td>
						<td>{{$brg->barang}}</td>
						<td>{{$brg->jumlah}}</td>
						<td>{{$brg->harga}}</td>
						
				</tr>
					@endforeach
					<tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>{{$barang->sum('jumlah')}}</td>
                        
                        
                     </tr>
                    </tr>
				

				</tbody>
				
				
			</table>
            {{ $barang->links ()}}
			<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				
			</div>
			<div class="modal-body">
			<form method="post" action="{{url('insert')}}">
			{{csrf_field()}}
            <h2>Tambah Barang</h2>
            
			
</div>
</div>
</div>
</div>
</body>



@endsection