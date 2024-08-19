@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Perhitungan SAW</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Perhitungan SAW </li>
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
                            <h5 class="mb-0 text-primary">Form Tambah Perhitungan SAW</h5>
                        </div>
                        <hr>
                        <form class="row g-3" action="{{ route('perhitungansaw.store') }}" method="post">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Jenis Zakat</label>
                                <input type="text" name="jenis_zakat" class="form-control" value="{{ $jenis_zakat }}"
                                    readonly>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Tanggal Perhitungan</label>
                                <input type="text" name="tgl_perhitungan" class="form-control"
                                    value="{{ $tgl_perhitungan }}" readonly>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Nama Cabang</label>
                                <input type="text" name="nama_cabang" class="form-control"
                                    value="{{ $cabang->nama_kantor }}" readonly>
                                <input type="text" name="cabang_id" class="form-control"
                                    value="{{ $cabang->id }}" hidden>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Penerima</label>
                                <select required name="penerima_id" class="form-select">
                                    <option value="">Pilih</option>
                                    @foreach ($penerimazakats as $penerima)
                                        <option value="{{ $penerima->id }}">{{ $penerima->nama_penerima }} / Jenis
                                            Penerima : {{ $penerima->jenis_zakat }} / Program : {{ $penerima->program }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Kriteria C1
                                    {{ $kriteriadetail->where('kode_kriteria', 'C1')->first()->kriteria->nama }} / Bobot
                                    {{ $kriteriadetail->where('kode_kriteria', 'C1')->first()->kriteria->bobot }}% / Atribut
                                    {{ $kriteriadetail->where('kode_kriteria', 'C1')->first()->kriteria->atribut }}</label>
                                <select required name="kode_kriteria_c1" class="form-select">
                                    <option value="">Pilih</option>
                                    @foreach ($kriteriadetail->where('kode_kriteria', 'C1') as $c1)
                                        <option value="{{ $c1->nilai }}">{{ $c1->keterangan }} / Nilai :
                                            {{ $c1->nilai }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Kriteria C2
                                    {{ $kriteriadetail->where('kode_kriteria', 'C2')->first()->kriteria->nama }} / Bobot
                                    {{ $kriteriadetail->where('kode_kriteria', 'C2')->first()->kriteria->bobot }}% /
                                    Atribut
                                    {{ $kriteriadetail->where('kode_kriteria', 'C2')->first()->kriteria->atribut }}</label>
                                <select required name="kode_kriteria_c2" class="form-select">
                                    <option value="">Pilih</option>
                                    @foreach ($kriteriadetail->where('kode_kriteria', 'C2') as $c2)
                                        <option value="{{ $c2->nilai }}">{{ $c2->keterangan }} / Nilai :
                                            {{ $c2->nilai }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Kriteria C3
                                    {{ $kriteriadetail->where('kode_kriteria', 'C3')->first()->kriteria->nama }} / Bobot
                                    {{ $kriteriadetail->where('kode_kriteria', 'C3')->first()->kriteria->bobot }}% /
                                    Atribut
                                    {{ $kriteriadetail->where('kode_kriteria', 'C3')->first()->kriteria->atribut }}</label>
                                <select required name="kode_kriteria_c3" class="form-select">
                                    <option value="">Pilih</option>
                                    @foreach ($kriteriadetail->where('kode_kriteria', 'C3') as $c3)
                                        <option value="{{ $c3->nilai }}">{{ $c3->keterangan }} / Nilai :
                                            {{ $c3->nilai }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Kriteria C4
                                    {{ $kriteriadetail->where('kode_kriteria', 'C4')->first()->kriteria->nama }} / Bobot
                                    {{ $kriteriadetail->where('kode_kriteria', 'C4')->first()->kriteria->bobot }}% /
                                    Atribut
                                    {{ $kriteriadetail->where('kode_kriteria', 'C4')->first()->kriteria->atribut }}</label>
                                <select required name="kode_kriteria_c4" class="form-select">
                                    <option value="">Pilih</option>
                                    @foreach ($kriteriadetail->where('kode_kriteria', 'C4') as $c4)
                                        <option value="{{ $c4->nilai }}">{{ $c4->keterangan }} / Nilai :
                                            {{ $c4->nilai }}</option>
                                    @endforeach
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
