@section('js')
@stop

@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Laporan SAW</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Laporan SAW</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-header">
                    <form action="{{ url('laporan-cetak') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <label for="tgl_perhitungan">Tanggal Perhitungan</label>
                                <input type="date" name="tgl_perhitungan" class="form-control"
                                    value="{{ request('tgl_perhitungan') }}" required>
                            </div>
                            <div class="col-md-2">
                                <label for="cabang">Kantor</label>
                                <select name="cabang" class="form-control">
                                    <option value="">Pilih Kantor</option>
                                    @foreach($cabangs as $cabang)
                                        <option value="{{ $cabang->id }}" {{ request('cabang') == $cabang->id ? 'selected' : '' }}>
                                            {{ $cabang->nama_kantor }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 mt-4">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
