@extends('layout.master')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Kriteria</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li> <li class="breadcrumb-item active" aria-current="page">Tambah Kriteria </li>
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
                        <h5 class="mb-0 text-primary">Form Tambah Kriteria</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action="{{route('kriteria.store')}}" method="post">
                          @csrf
                        <div class="col-12">
                            <label class="form-label">Kode Kriteria</label>
                            <select required name="kode_kriteria" class="form-select">
                                <option value="">Pilih</option>
                                @php $c1= $kriteria_kodes->where('kode_kriteria','C1')->first(); @endphp
                                @php $c2= $kriteria_kodes->where('kode_kriteria','C2')->first(); @endphp
                                @php $c3= $kriteria_kodes->where('kode_kriteria','C3')->first(); @endphp
                                @php $c4= $kriteria_kodes->where('kode_kriteria','C4')->first(); @endphp
                                @if(!$c1)
                                <option value="C1">C1</option>
                                @endif
                                @if(!$c2)
                                <option value="C2">C2</option>  
                                @endif
                                @if(!$c3)
                                <option value="C3">C3</option>
                                @endif
                                @if(!$c4)
                                <option value="C4">C4</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nama Kriteria</label>
                            <input type="text"   class="form-control" name="nama" required autofocus>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Bobot</label>
                            <input type="text"   class="form-control" name="bobot" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Atribut</label>
                            <select required name="atribut" class="form-select">
                                <option value="">Pilih</option>
                                <option value="benefit">benefit</option>
                                <option value="cost">cost</option>
                            </select>
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