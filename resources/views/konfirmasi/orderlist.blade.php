@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="wrap">
    <div class="blog">
        <div class="conteudo">
            <table class="table table-hover">
                    <thead>
                <tr>
                <th>penerima</th>
                <th>Alamat</th>
                <th>barang</th>
                <th>jumlah</th>

                @foreach($konfirmasi as $bbrg)
                <tbody>
               
                <td>{{$bbrg->nama_penerima}}</td> 
                <td>{{$bbrg->alamat}}</td> 
               
                <td>
                @foreach($bbrg->psanan as $p)
                    {{$p->id_barang}}</br>
                    @endforeach
                </td>


                
                <td>{{$bbrg->psanan->count()}}</td>
                 
              
               
                </tbody>
                @endforeach
            </table>
            
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">



</script>
@endsection