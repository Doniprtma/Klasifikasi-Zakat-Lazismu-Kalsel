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
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Kriteria
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="col">
                <div class="card">
                    {{-- <div class="card-header">
                        @php
                            $c1 = $datas->where('kode_kriteria', 'C1')->count();
                            $c2 = $datas->where('kode_kriteria', 'C2')->count();
                            $c3 = $datas->where('kode_kriteria', 'C3')->count();
                        $c4 = $datas->where('kode_kriteria', 'C4')->count(); @endphp
                        @if ($c1 && $c2 && $c3 && $c4 == 0)
                            <a href="{{ route('kriteria.create') }}" class="btn btn-success"> &nbsp;<i
                                    class="fa fa-plus"></i></a>
                        @else
                            -
                        @endif

                    </div> --}}
                    <div class="card-body">

                        @if (session()->has('message'))
                            <div class="alert alert-info">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Kriteria</th>
                                        <th scope="col">Bobot</th>
                                        <th scope="col">Atribut</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($datas as $data)
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $data->kode_kriteria }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->bobot }}%</td>
                                            <td>{{ $data->atribut }}</td>

                                            <td>
                                                <div class="btn-group">
                                                    @if (!$perhitungansaw > 0)
                                                        <a href="{{ route('kriteria.edit', $data->id) }}">
                                                            <button class="btn btn-edit fas fa-edit btn-info"></button>
                                                        </a>
                                                    @else
                                                        -
                                                    @endif
                                                    {{-- &nbsp;
                                                    <form action="{{ route('kriteria.destroy', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm " type="submit"
                                                            onclick="return confirm('anda yakin ingin menghapus data ini?')"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form> --}}




                                                </div>
                                            </td>
                                        </tr>
                                        @php $no++ @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <ul>
                                <li>Untuk atribut keuntungan / benefit (lebih besar lebih baik)</li>
                                <li>Untuk atribut kerugian / cost (lebih kecil lebih baik)</li>
                                <li>Data tidak dapat diedit lagi jika sudah ada perhitungan saw.</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th colspan="4">Menampilkan Detail Kriteria C1 :
                                            {{ $data->where('kode_kriteria', 'C1')->select('nama')->first()->nama }}</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($datas_detail->where('kode_kriteria', 'C1') as $datad)
                                        <tr>
                                            <td>{{ $datad->kode_kriteria }}</td>
                                            <td>{{ $datad->keterangan }}</td>
                                            <td>{{ $datad->nilai }}</td>

                                            <td>
                                                <div class="btn-group">
                                                    @if (!$perhitungansaw > 0)
                                                        <a href="{{ route('kriteriadetail.edit', $datad->id) }}">
                                                            <button class="btn btn-edit fas fa-edit btn-info"></button>
                                                        </a>
                                                    @endif



                                                </div>
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


            <div class="col">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th colspan="4">Menampilkan Detail Kriteria C2 :
                                            {{ $data->where('kode_kriteria', 'C2')->select('nama')->first()->nama }}</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($datas_detail->where('kode_kriteria', 'C2') as $datad)
                                        <tr>
                                            <td>{{ $datad->kode_kriteria }}</td>
                                            <td>{{ $datad->keterangan }}</td>
                                            <td>{{ $datad->nilai }}</td>

                                            <td>
                                                <div class="btn-group">
                                                    @if (!$perhitungansaw > 0)
                                                        <a href="{{ route('kriteriadetail.edit', $datad->id) }}">
                                                            <button class="btn btn-edit fas fa-edit btn-info"></button>
                                                        </a>
                                                    @endif



                                                </div>
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


            <div class="col">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th colspan="4">Menampilkan Detail Kriteria C3 :
                                            {{ $data->where('kode_kriteria', 'C3')->select('nama')->first()->nama }}</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($datas_detail->where('kode_kriteria', 'C3') as $datad)
                                        <tr>
                                            <td>{{ $datad->kode_kriteria }}</td>
                                            <td>{{ $datad->keterangan }}</td>
                                            <td>{{ $datad->nilai }}</td>

                                            <td>
                                                <div class="btn-group">
                                                    @if (!$perhitungansaw > 0)
                                                        <a href="{{ route('kriteriadetail.edit', $datad->id) }}">
                                                            <button class="btn btn-edit fas fa-edit btn-info"></button>
                                                        </a>
                                                    @endif



                                                </div>
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


            <div class="col">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th colspan="4">Menampilkan Detail Kriteria C4 :
                                            {{ $data->where('kode_kriteria', 'C4')->select('nama')->first()->nama }}</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($datas_detail->where('kode_kriteria', 'C4') as $datad)
                                        <tr>
                                            <td>{{ $datad->kode_kriteria }}</td>
                                            <td>{{ $datad->keterangan }}</td>
                                            <td>{{ $datad->nilai }}</td>

                                            <td>
                                                <div class="btn-group">
                                                    @if (!$perhitungansaw > 0)
                                                        <a href="{{ route('kriteriadetail.edit', $datad->id) }}">
                                                            <button class="btn btn-edit fas fa-edit btn-info"></button>
                                                        </a>
                                                    @endif



                                                </div>
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
