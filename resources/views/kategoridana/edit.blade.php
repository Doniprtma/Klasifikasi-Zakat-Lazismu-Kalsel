@extends('layout.master')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Kategori Dana</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li> <li class="breadcrumb-item active" aria-current="page">Edit Kategori Dana</li>
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
                        <h5 class="mb-0 text-primary">Form Edit Kategori Dana</h5>
                    </div>
                    <hr>
                    <form class="row g-3" action="{{route('kategoridana.update', $data->id)}}" method="post">
                          @csrf
                         @method('put')
                             <div class="col-12">
                            <label class="form-label">Jenis Dana</label>
                            <select required name="jenis_dana" class="form-select">
                                <option value="">Pilih</option>
                                <option value="Fakir" {{$data->jenis_dana == 'Fakir' ? 'selected' : ''}}>Fakir</option>
                                <option value="Miskin" {{$data->jenis_dana == 'Miskin' ? 'selected' : ''}}>Miskin</option>
                                <option value="Amil" {{$data->jenis_dana == 'Amil' ? 'selected' : ''}}>Amil</option>
                                <option value="Mualaf" {{$data->jenis_dana == 'Mualaf' ? 'selected' : ''}}>Mualaf</option>
                                <option value="Riqab" {{$data->jenis_dana == 'Riqab' ? 'selected' : ''}}>Riqab</option>
                                <option value="Gharim" {{$data->jenis_dana == 'Gharim' ? 'selected' : ''}}>Gharim</option>
                                <option value="Fisabillah" {{$data->jenis_dana == 'Fisabillah' ? 'selected' : ''}}>Fisabillah</option>
                                <option value="Ibnu Sabil" {{$data->jenis_dana == 'Ibnu Sabil' ? 'selected' : ''}}>Ibnu Sabil</option>
                                <option value="Bagi Dana Zakat Otomatis" {{$data->jenis_dana == 'Bagi Dana Zakat Otomatis' ? 'selected' : ''}}>Bagi Dana Zakat Otomatis</option> 
                                <option value="Pengeluaran" {{$data->jenis_dana == 'Pengeluaran' ? 'selected' : ''}}>Pengeluaran</option> 
                            </select>
                        </div>
                         
                        <div class="col-12">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" value="{{$data->nama_kategori}}" name="nama_kategori" required autofocus>
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