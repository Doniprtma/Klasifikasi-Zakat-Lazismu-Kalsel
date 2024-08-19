@extends('layout.master')
@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
 <style type="text/css">
.thumbnail{
    width: 50px;
}
</style>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@stop

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Penerima Zakat</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Penerima Zakat
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('penerimazakat.create')}}" class="btn btn-success"> &nbsp;<i class="fa fa-plus"></i></a>
                </div>
                <div class="card-body">
                    @if(session()->has('message'))
                        <div class="alert alert-info">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Penerima</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Jenis Zakat</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    {{-- <th scope="col">Pekerjaan</th>
                                    <th scope="col">Penghasilan</th> --}}
                                    <th scope="col">Program</th>
                                    <th scope="col">Kantor</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($datas as $data)
                                <tr>
                                    <th scope="row">{{$no;}}</th>
                                    <td>{{$data->nama_penerima}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>{{$data->jenis_zakat}}</td>
                                    <td>{{$data->nik}}</td>
                                    <td>{{$data->jenis_kelamin}}</td>
                                    {{-- <td>{{$data->pekerjaan}}</td>
                                    <td>{{$data->penghasilan}}</td> --}}
                                    <td>{{$data->program}}</td>
                                    <td>{{$data->cabang->kategori}} / {{$data->cabang->nama_kantor}}</td>
                                    <td>
                                        @if(empty($perhitungan->where('penerima_id', $data->id)->first()))
                                        <div class="btn-group">
                                            <a href="{{route('penerimazakat.edit', $data->id)}}">
                                                <button class="btn btn-edit fas fa-edit btn-info"></button>
                                            </a>
                                            &nbsp;
                                            <form action="{{route('penerimazakat.destroy', $data->id)}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                        @else
                                        Data sudah masuk ke perhitungan saw.
                                        @endif
                                    </td>
                                </tr>
                                @php $no++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
