@extends('layout.master')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Kantor</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li> <li class="breadcrumb-item active" aria-current="page">Edit Kantor</li>
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
                        <h5 class="mb-0 text-primary">Form Edit Kantor</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action="{{route('cabang.update', $data->id)}}" method="post">
                          @csrf
                         @method('put')
                         <div class="col-12">
                            <label class="form-label">Kategori</label>
                            <select required name="kategori" class="form-select">
                                <option value="">Pilih</option>
                                <option value="Wilayah"  {{$data->kategori == 'Wilayah' ? 'selected' : ''}}>Wilayah</option>
                                <option value="Daerah" {{$data->kategori == 'Daerah' ? 'selected' : ''}}>Daerah</option>
                                <option value="Kantor Layanan" {{$data->kategori == 'Kantor Layanan' ? 'selected' : ''}}>Kantor Layanan</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nama Kantor</label>
                            <input type="text"   class="form-control" value="{{$data->nama_kantor}}" name="nama_kantor" required autofocus>
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