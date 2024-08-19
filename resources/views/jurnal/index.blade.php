@section('css')
    <style type="text/css">
        .btn-lihat:hover {
            cursor: pointer;
        }
        .filter-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .filter-container select {
            max-width: 200px;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            // Menangani tombol "Lihat Detail"
            $('.btn-lihat').click(function() {
                var ket_dana = $(this).data('ket_dana');
                renderUlLi(ket_dana);
                $('#modalDetail').modal('show');
            });

            $('#filterCabang').change(function() {
                var cabang = $(this).val();
                window.location.href = '{{ route("jurnal.index") }}' + '?cabang=' + cabang;
            });
        });

        function renderUlLi(ulLiData) {
            var detailKetDana = document.getElementById('detailKetDana');
            detailKetDana.innerHTML = '';
            var ulElement = document.createElement('ul');
            ulElement.innerHTML = ulLiData;
            detailKetDana.appendChild(ulElement);
        }
    </script>
@stop

@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Jurnal</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Jurnal</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <a href="{{ route('jurnal.create') }}" class="btn btn-success"> &nbsp;<i class="fa fa-plus"></i></a>
                        <div class="filter-container">
                            <label for="filterCabang" class="form-label">Filter Kantor:</label>
                            <select id="filterCabang" class="form-select">
                                <option value="">Pilih Kantor</option>
                                @foreach($cabangs as $cabang)
                                    <option value="{{ $cabang->id }}" {{ request('cabang') == $cabang->id ? 'selected' : '' }}>
                                        {{ $cabang->nama_kantor }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-info">{{ session('message') }}</div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="example2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jenis</th>
                                        <th>Alokasi Dana</th>
                                        <th>Tgl Transaksi</th>
                                        <th>No. Ref</th>
                                        <th>No. Akun</th>
                                        <th>Nama Akun</th>
                                        <th>Bank</th>
                                        <th>Anggaran Kredit</th>
                                        <th>Anggaran Debit</th>
                                        <th>Program</th>
                                        <th>Keterangan</th>
                                        <th>Kantor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                        $totalKredit = 0;
                                        $totalDebit = 0;
                                    @endphp
                                    @foreach ($datas as $data)
                                        <tr>
                                            <th>{{ $no }}</th>
                                            <td>{{ $data->jenis }}</td>
                                            <td>{{ $data->kategori->nama_kategori }}</td>
                                            <td>{{ $data->tgl_transaksi }}</td>
                                            <td>{{ $data->no_ref }}</td>
                                            <td>{{ $data->nomor_akun }}</td>
                                            <td>{{ $data->nama_akun }}</td>
                                            <td>{{ $data->bank }}</td>
                                            <th>
                                                @if($data->jenis == 'Kredit')
                                                    Rp {{ $data->anggaran }}
                                                    <span class="btn-lihat badge rounded-pill bg-info" data-toggle="modal" data-target="#modalDetail" data-ket_dana="{{ $data->ket_dana }}">
                                                        <i class="fa fa-info"></i>
                                                    </span>
                                                @endif
                                            </th>
                                            <th>
                                                @if($data->jenis == 'Debit')
                                                    Rp {{ $data->anggaran }}
                                                    <span class="btn-lihat badge rounded-pill bg-info" data-toggle="modal" data-target="#modalDetail" data-ket_dana="{{ $data->ket_dana }}">
                                                        <i class="fa fa-info"></i>
                                                    </span>
                                                @endif

                                                @if ($data->jenis == 'Debit')
                                                    <?php $totalDebit += is_numeric(str_replace('.', '', $data->anggaran)) ? str_replace('.', '', $data->anggaran) : 0; ?>
                                                @else
                                                    <?php $totalKredit += is_numeric(str_replace('.', '', $data->anggaran)) ? str_replace('.', '', $data->anggaran) : 0; ?>
                                                @endif
                                            </th>
                                            <td>{{ $data->program }}</td>
                                            <td>{{ $data->keterangan }}</td>
                                            <td>{{ $data->cabang->nama_kantor }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('jurnal.edit', $data->id) }}">
                                                        <button class="btn btn-edit fas fa-edit btn-info"></button>
                                                    </a>
                                                    &nbsp;
                                                    <form action="{{ route('jurnal.destroy', $data->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @php $no++ @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="7"></td>
                                    <th>Total</th>
                                    <th>Rp {{ number_format($totalKredit, 0, ',', '.') }}</th>
                                    <th>Rp {{ number_format($totalDebit, 0, ',', '.') }}</th>
                                    <th colspan="4">Selisih Rp {{ number_format($totalKredit - $totalDebit, 0, ',', '.') }}</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDetailLabel">Detail Dana</h5>
                </div>
                <div class="modal-body">
                    <div id="detailKetDana"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
