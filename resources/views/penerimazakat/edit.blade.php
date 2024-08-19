@extends('layout.master')
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
                            <li class="breadcrumb-item active" aria-current="page">Edit Penerima Zakat</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="col">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="font-22 text-primary"></i></div>
                            <h5 class="mb-0 text-primary">Form Edit Penerima Zakat dan Perhitungan SAW</h5>
                        </div>
                        <hr>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="row g-3" action="{{ route('penerimazakat.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <label class="form-label">Nama Penerima</label>
                                <input type="text" class="form-control" name="nama_penerima" value="{{ old('nama_penerima', $data->nama_penerima) }}" required autofocus>
                            </div>
                            <div class="col-12">
                                <label class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" value="{{ old('nik', $data->nik) }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Jenis Kelamin</label>
                                <select required name="jenis_kelamin" class="form-select">
                                    <option value="">Pilih</option>
                                    <option value="Laki-Laki" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Program</label>
                                <input type="text" class="form-control" name="program" value="{{ old('program', $data->program) }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Alamat Penerima</label>
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $data->alamat) }}" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Jenis Zakat</label>
                                <select required name="jenis_zakat" class="form-select">
                                    <option value="">Pilih</option>
                                    <option value="Fakir" {{ old('jenis_zakat', $data->jenis_zakat) == 'Fakir' ? 'selected' : '' }}>Fakir</option>
                                    <option value="Miskin" {{ old('jenis_zakat', $data->jenis_zakat) == 'Miskin' ? 'selected' : '' }}>Miskin</option>
                                    <option value="Amil" {{ old('jenis_zakat', $data->jenis_zakat) == 'Amil' ? 'selected' : '' }}>Amil</option>
                                    <option value="Mualaf" {{ old('jenis_zakat', $data->jenis_zakat) == 'Mualaf' ? 'selected' : '' }}>Mualaf</option>
                                    <option value="Riqab" {{ old('jenis_zakat', $data->jenis_zakat) == 'Riqab' ? 'selected' : '' }}>Riqab</option>
                                    <option value="Gharim" {{ old('jenis_zakat', $data->jenis_zakat) == 'Gharim' ? 'selected' : '' }}>Gharim</option>
                                    <option value="Fisabillah" {{ old('jenis_zakat', $data->jenis_zakat) == 'Fisabillah' ? 'selected' : '' }}>Fisabillah</option>
                                    <option value="Ibnu Sabil" {{ old('jenis_zakat', $data->jenis_zakat) == 'Ibnu Sabil' ? 'selected' : '' }}>Ibnu Sabil</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Kantor</label>
                                <select class="form-control" name="cabang_id" required>
                                    <option value="">Pilih Kantor</option>
                                    @foreach ($cabangs as $cabang)
                                        <option value="{{ $cabang->id }}" {{ old('cabang_id', $data->cabang_id) == $cabang->id ? 'selected' : '' }}>
                                            {{ $cabang->kategori }} / {{ $cabang->nama_kantor }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Tanggal Perhitungan</label>
                                <input type="date" name="tgl_perhitungan" class="form-control" value="{{ old('tgl_perhitungan', $data->perhitunganSaw->first()->tgl_perhitungan ?? '') }}" required>
                            </div>

                            @php
                                $kriteriadetail = \App\Models\KriteriaDetail::get();
                            @endphp

                            <div class="col-12">
                                <label class="form-label">Kriteria C1
                                    {{ $kriteriadetail->where('kode_kriteria', 'C1')->first()->kriteria->nama }} / Bobot
                                    {{ $kriteriadetail->where('kode_kriteria', 'C1')->first()->kriteria->bobot }}% / Atribut
                                    {{ $kriteriadetail->where('kode_kriteria', 'C1')->first()->kriteria->atribut }}</label>
                                <select required name="kode_kriteria_c1" class="form-select">
                                    <option value="">Pilih</option>
                                    @foreach ($kriteriadetail->where('kode_kriteria', 'C1') as $c1)
                                        <option value="{{ $c1->nilai }}" {{ old('kode_kriteria_c1', $data->perhitunganSaw->where('kode_kriteria', 'C1')->first()->nilai ?? '') == $c1->nilai ? 'selected' : '' }}>
                                            {{ $c1->keterangan }} / Nilai : {{ $c1->nilai }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Kriteria C2
                                    {{ $kriteriadetail->where('kode_kriteria', 'C2')->first()->kriteria->nama }} / Bobot
                                    {{ $kriteriadetail->where('kode_kriteria', 'C2')->first()->kriteria->bobot }}% / Atribut
                                    {{ $kriteriadetail->where('kode_kriteria', 'C2')->first()->kriteria->atribut }}</label>
                                <select required name="kode_kriteria_c2" class="form-select">
                                    <option value="">Pilih</option>
                                    @foreach ($kriteriadetail->where('kode_kriteria', 'C2') as $c2)
                                        <option value="{{ $c2->nilai }}" {{ old('kode_kriteria_c2', $data->perhitunganSaw->where('kode_kriteria', 'C2')->first()->nilai ?? '') == $c2->nilai ? 'selected' : '' }}>
                                            {{ $c2->keterangan }} / Nilai : {{ $c2->nilai }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Kriteria C3
                                    {{ $kriteriadetail->where('kode_kriteria', 'C3')->first()->kriteria->nama }} / Bobot
                                    {{ $kriteriadetail->where('kode_kriteria', 'C3')->first()->kriteria->bobot }}% / Atribut
                                    {{ $kriteriadetail->where('kode_kriteria', 'C3')->first()->kriteria->atribut }}</label>
                                <select required name="kode_kriteria_c3" class="form-select">
                                    <option value="">Pilih</option>
                                    @foreach ($kriteriadetail->where('kode_kriteria', 'C3') as $c3)
                                        <option value="{{ $c3->nilai }}" {{ old('kode_kriteria_c3', $data->perhitunganSaw->where('kode_kriteria', 'C3')->first()->nilai ?? '') == $c3->nilai ? 'selected' : '' }}>
                                            {{ $c3->keterangan }} / Nilai : {{ $c3->nilai }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Kriteria C4
                                    {{ $kriteriadetail->where('kode_kriteria', 'C4')->first()->kriteria->nama }} / Bobot
                                    {{ $kriteriadetail->where('kode_kriteria', 'C4')->first()->kriteria->bobot }}% / Atribut
                                    {{ $kriteriadetail->where('kode_kriteria', 'C4')->first()->kriteria->atribut }}</label>
                                <select required name="kode_kriteria_c4" class="form-select">
                                    <option value="">Pilih</option>
                                    @foreach ($kriteriadetail->where('kode_kriteria', 'C4') as $c4)
                                        <option value="{{ $c4->nilai }}" {{ old('kode_kriteria_c4', $data->perhitunganSaw->where('kode_kriteria', 'C4')->first()->nilai ?? '') == $c4->nilai ? 'selected' : '' }}>
                                            {{ $c4->keterangan }} / Nilai : {{ $c4->nilai }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mt-5">
                                <button type="submit" class="btn btn-primary px-5">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
