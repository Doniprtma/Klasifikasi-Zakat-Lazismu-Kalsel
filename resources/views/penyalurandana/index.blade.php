@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <style type="text/css">
        .thumbnail {
            width: 50px;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#modalCetakKwitansi').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var tgl_penyaluran = button.data('tgl_penyaluran')
                var cash_transfer = button.data('cash_transfer')
                var keterangan = button.data('keterangan')
                
                console.log({
                    id: id,
                    tgl_penyaluran: tgl_penyaluran,
                    cash_transfer: cash_transfer,
                    keterangan: keterangan
                });

                var modal = $(this)
                modal.find('#id_penyaluran_dana').val(id)
                modal.find('#tgl_penyaluran').val(tgl_penyaluran)
                modal.find('#cash_transfer').val(cash_transfer)
                modal.find('#keterangan').val(keterangan)
            })
        });
    </script>
@stop

@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Riwayat Penyaluran Dana</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Riwayat Data Penyaluran Dana {{$jenis_zakat}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-info">
                                {{ session('message') }}
                            </div>
                        @endif
                        <form method="GET" action="{{ route('penyalurandana.index') }}">
                            <input type="hidden" name="jenis_zakat" value="{{ request('jenis_zakat') }}">
                            <input type="hidden" name="cabang_id" value="{{ request('cabang_id') }}">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="start_date" class="form-label">Periode Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date"
                                        value="{{ request('start_date') }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="end_date" class="form-label">Tanggal Sampai</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date"
                                        value="{{ request('end_date') }}">
                                </div>
                                <div class="col-md-3 align-self-end">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="example2">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tgl Perhitungan</th>
                                        <th scope="col">Nama Penerima</th>
                                        <th scope="col">Jenis Zakat</th>
                                        <th scope="col">Total Dana Disalurkan</th>
                                        <th scope="col">Kantor</th>
                                        <th scope="col">Tgl Penyaluran</th>
                                        <th scope="col">Cash Transfer</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                        $totalDana = 0;
                                    @endphp
                                    @foreach ($datas as $data)
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $data->tgl_perhitungan }}</td>
                                            <td>{{ $data->penerimaZakat->nama_penerima }}</td>
                                            <td>{{ $data->jenis_zakat }}</td>
                                            <td>Rp {{ format_rupiah($data->total_dana_diterima) }}</td>
                                            <td>{{ $data->penerimaZakat->cabang->nama_kantor }}</td>
                                            <td>{{ $data->tgl_penyaluran }}</td>
                                            <td>{{ $data->cash_transfer }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td>
                                                <button class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#modalCetakKwitansi" data-id="{{ $data->id }}"
                                                    data-tgl_penyaluran="{{ $data->tgl_penyaluran }}"
                                                    data-cash_transfer="{{ $data->cash_transfer }}"
                                                    data-keterangan="{{ $data->keterangan }}">
                                                    Cetak Kwitansi
                                                </button>
                                                <a href="{{ route('perhitungansaw.index', [
                                                    'jenis_zakat' => $data->jenis_zakat,
                                                    'tgl_perhitungan' => $data->tgl_perhitungan,
                                                    'cabang_id' => $data->penerimaZakat->cabang->id,
                                                ]) }}" class="btn btn-info">Lihat Detail</a>
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                            $totalDana += $data->total_dana_diterima;
                                        @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <th>Total</th>
                                        <th>Rp {{ number_format($totalDana, 0, ',', '.') }}</th>
                                        <th colspan="4"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cetak Kwitansi -->
    <div class="modal fade" id="modalCetakKwitansi" tabindex="-1" role="dialog" aria-labelledby="modalCetakKwitansiLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form id="formCetakKwitansi" method="POST" action="{{ route('penyalurandana.cetak_kwitansi') }}">
                @csrf
                <input type="hidden" name="id" id="id_penyaluran_dana">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCetakKwitansiLabel">Cetak Kwitansi</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="tgl_penyaluran" class="form-label">Tanggal Penyaluran</label>
                            <input type="date" class="form-control" id="tgl_penyaluran" name="tgl_penyaluran">
                        </div>
                        <div class="mb-3">
                            <label for="cash_transfer" class="form-label">Cash Transfer</label>
                            <input type="text" class="form-control" id="cash_transfer" name="cash_transfer">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan dan Cetak</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
