@extends('layout.master')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Kriteria Detail</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li> <li class="breadcrumb-item active" aria-current="page">Edit Kriteria Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="col">
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="font-22 text-primary"></i>
                        </div>
                        <h5 class="mb-0 text-primary">Form Edit Kriteria : {{$data->kode_kriteria}} {{$data->kriteria->nama}}</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action="{{route('kriteriadetail.update', $data->id)}}" method="post">
                          @csrf
                        <div class="col-12">
                            <label class="form-label">Keterangan Detail Kriteria</label>
                            <input type="text"   class="form-control" name="keterangan" value="{{$data->keterangan}}" required autofocus>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nilai</label>
                            <input type="text"   class="form-control" name="nilai" value="{{$data->nilai}}" disabled>
                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary px-5">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection