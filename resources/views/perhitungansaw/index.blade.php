@section('js')
    <script>
        $(document).ready(function() {
            var totalAll = parseFloat($('.total_all').text());

            $('.total_preferensi').each(function() {
                var totalPreferensi = parseFloat($(this).text());

                var persentase = (totalAll !== 0) ? totalPreferensi / totalAll * 100 : 0;

                $(this).closest('tr').find('.total_persentase').text(persentase.toFixed(2) + '%');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Function to format number to Indonesian currency
            function format_rupiah(angka) {
                // Bulatkan ke dua desimal dan ubah menjadi string
                angka = angka.toFixed(0).toString();

                // Pisahkan angka dan desimal
                var parts = angka.split('.');

                // Format angka dengan pemisah ribuan
                parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                // Gabungkan kembali dengan desimal
                return parts.join(',');
            }


            // Function to calculate total_dana_diterima
            function calculateTotalDanaDiterima(persentase, totalDanaTersedia) {
                return (persentase / 100) * totalDanaTersedia;
            }

            // Menghitung total_all
            var totalAll = parseFloat($('.total_all2').text());

            // Remove dots and convert dana_tersedia to float
            var totalDanaTersedia = parseFloat($('.dana_tersedia').text().replace(/\./g, '').replace(/[^0-9.]/g,
                ''));

            // Menghitung persentase pembagian dan menetapkannya ke kolom "Persentase Pembagian (100%)"
            $('.total_preferensi2').each(function() {
                var $row = $(this).closest('tr');
                var totalPersentase = parseFloat($(this).text());
                var persentase = (totalAll !== 0) ? totalPersentase / totalAll * 100 : 0;

                $row.find('.total_persentase_pembagian').text(persentase.toFixed(2) + '%');

                var totalDanaDiterima = calculateTotalDanaDiterima(persentase, totalDanaTersedia);
                $row.find('.total_dana_diterima').text('Rp ' + format_rupiah(totalDanaDiterima));

                $row.find('input.total_dana_diterima_form').val(format_rupiah(totalDanaDiterima));
                $row.find('input.total_persentase').val(persentase.toFixed(2) + '%');


            });
        });
    </script>








@stop

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
                            <li class="breadcrumb-item active" aria-current="page">Data Perhitungan SAW</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-header">
                    <form action="{{ route('perhitungansaw.index') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="jenis_zakat">Jenis Zakat</label>
                                <select name="jenis_zakat" class="form-select" required>
                                    <option value="">Pilih Jenis Zakat</option>
                                    @foreach (['Fakir', 'Miskin', 'Amil', 'Mualaf', 'Riqab', 'Gharim', 'Fisabillah', 'Ibnu Sabil'] as $jenis)
                                        <option value="{{ $jenis }}"
                                            {{ request('jenis_zakat') == $jenis ? 'selected' : '' }}>
                                            {{ $jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="tgl_perhitungan">Tanggal Perhitungan</label>
                                <input type="date" name="tgl_perhitungan" class="form-control"
                                    value="{{ request('tgl_perhitungan') }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="cabang_id">Kantor</label>
                                <select class="form-control" name="cabang_id" id="cabang_id" required>
                                    <option value="">Pilih Kantor</option>
                                    @foreach ($cabangs as $cabang)
                                        <option value="{{ $cabang->id }}"
                                            {{ request('cabang_id') == $cabang->id ? 'selected' : '' }}>
                                            {{ $cabang->kategori }} / {{ $cabang->nama_kantor }}</option>
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


            <div class="col">

                <div class="card">
                    {{-- <div class="card-header">
                        @if (!is_null($jenis_zakat))
                            @if (empty(
                                    $penyalurandana->where('jenis_zakat', $jenis_zakat)->where('tgl_perhitungan', $tgl_perhitungan)->whereHas('penerimaZakat', function ($query) use ($cabang_id) {
                                            $query->where('cabang_id', $cabang_id);
                                        })->first()
                                ))

                                @if (getTotalDana($jenis_zakat, $cabang_id) > 0)
                                    <a href="{{ route('perhitungansaw.create') }}?req={{ $jenis_zakat }}&cabang_id={{ $cabang_id }}&tgl_perhitungan={{ $tgl_perhitungan }}"
                                        class="btn btn-success">
                                        &nbsp;<i class="fa fa-plus"></i>
                                    </a>
                                @else
                                    <p>Saldo Dana Zakat <b>{{ $jenis_zakat }}</b> Rp 0. Tidak bisa melakukan proses
                                        perhitungan zakat dengan metode saw.</p>
                                @endif
                            @else
                                <p>Tidak dapat menambahkan data lagi karena penyaluran dana sudah di-generate pada tanggal
                                    perhitungan ini.</p>
                            @endif
                        @endif
                    </div> --}}
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-info">
                                {{ session('message') }}
                            </div>
                        @endif

                        @if ($datas->isEmpty() || is_null($jenis_zakat))
                            <p>Tidak ada data.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0 table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kode Alternatif</th>
                                            <th scope="col">Alternatif</th>
                                            <th scope="col">C1 (Bobot :
                                                {{ $kriteria->where('kode_kriteria', 'C1')->first()->bobot }}%)</th>
                                            <th scope="col">C2 (Bobot :
                                                {{ $kriteria->where('kode_kriteria', 'C2')->first()->bobot }}%)</th>
                                            <th scope="col">C3 (Bobot :
                                                {{ $kriteria->where('kode_kriteria', 'C3')->first()->bobot }}%)</th>
                                            <th scope="col">C4 (Bobot :
                                                {{ $kriteria->where('kode_kriteria', 'C4')->first()->bobot }}%)</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($datas as $key => $data)
                                            <tr>
                                                <td>A{{ $key + 1 }}</td>
                                                <td>{{ $data->nama_penerima }}</td>
                                                <td>{{ optional($data->perhitunganSaw->where('kode_kriteria', 'C1')->where('tgl_perhitungan', $tgl_perhitungan)->first())->nilai }}
                                                </td>
                                                <td>{{ optional($data->perhitunganSaw->where('kode_kriteria', 'C2')->where('tgl_perhitungan', $tgl_perhitungan)->first())->nilai }}
                                                </td>
                                                <td>{{ optional($data->perhitunganSaw->where('kode_kriteria', 'C3')->where('tgl_perhitungan', $tgl_perhitungan)->first())->nilai }}
                                                </td>
                                                <td>{{ optional($data->perhitunganSaw->where('kode_kriteria', 'C4')->where('tgl_perhitungan', $tgl_perhitungan)->first())->nilai }}
                                                </td>

                                                <td>
                                                    @if (empty(
                                                            $penyalurandana->where('jenis_zakat', $jenis_zakat)->where('tgl_perhitungan', $tgl_perhitungan)->whereHas('penerimaZakat', function ($query) use ($cabang_id) {
                                                                    $query->where('cabang_id', $cabang_id);
                                                                })->first()
                                                        ))
                                                        <div class="btn-group">
                                                            @if ($data->perhitunganSaw->where('tgl_perhitungan', $tgl_perhitungan)->isNotEmpty())
                                                                <a href="{{ route('perhitungansaw.edit', $data->id) }}">
                                                                    <button
                                                                        class="btn btn-edit fas fa-edit btn-info"></button>
                                                                </a>
                                                                &nbsp;
                                                                <form
                                                                    action="{{ route('perhitungansaw.destroy', $data->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-danger btn-sm" type="submit"
                                                                        onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @php $no++ @endphp
                                        @endforeach
                                        <tr>
                                            <td colspan="2">Min / Max Value</td>
                                            <td>{{ optional($minmaxValues->where('kode_kriteria', 'C1')->first())->minmax_value }}
                                                ({{ $kriteria->where('kode_kriteria', 'C1')->first()->atribut }})
                                            </td>
                                            <td>{{ optional($minmaxValues->where('kode_kriteria', 'C2')->first())->minmax_value }}
                                                ({{ $kriteria->where('kode_kriteria', 'C2')->first()->atribut }})
                                            </td>
                                            <td>{{ optional($minmaxValues->where('kode_kriteria', 'C3')->first())->minmax_value }}
                                                ({{ $kriteria->where('kode_kriteria', 'C3')->first()->atribut }})
                                            </td>
                                            <td>{{ optional($minmaxValues->where('kode_kriteria', 'C4')->first())->minmax_value }}
                                                ({{ $kriteria->where('kode_kriteria', 'C4')->first()->atribut }})
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered mt-4 table-striped">
                            <thead>
                                <tr>
                                    <th colspan="6">Hasil Normalisasi</th>
                                </tr>
                                <tr>
                                    <th scope="col">Kode Alternatif</th>
                                    <th scope="col">Alternatif</th>
                                    @foreach ($kriteria as $k)
                                        <th scope="col">{{ $k->kode_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $key => $data)
                                    <tr>
                                        <td>A{{ $key + 1 }}</td>
                                        <td>{{ $data->nama_penerima }}</td>
                                        @foreach ($kriteria as $k)
                                            @php
                                                $minmax = optional(
                                                    $minmaxValues->where('kode_kriteria', $k->kode_kriteria)->first(),
                                                )->minmax_value;
                                                $nilai = optional(
                                                    $data->perhitunganSaw
                                                        ->where('kode_kriteria', $k->kode_kriteria)
                                                        ->first(),
                                                )->nilai;
                                                $atribut = $k->atribut;

                                                // Check for division by zero
                                                $result =
                                                    $minmax != 0 && $nilai != 0
                                                        ? ($atribut == 'cost'
                                                            ? $minmax / $nilai
                                                            : $nilai / $minmax)
                                                        : '';
                                            @endphp
                                            <td>{{ $result }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered mt-4 table-striped">
                            <thead>
                                <tr>
                                    <th colspan="6">Hasil Perhitungan SAW</th>
                                </tr>
                                <tr>
                                    <th scope="col">Kode Alternatif</th>
                                    <th scope="col">Alternatif</th>
                                    <th scope="col">Preferensi</th>
                                    <th scope="col">Persentase Pembagian (100%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @php $total_all = 0; @endphp
                                @foreach ($datas as $key => $data)
                                    @php
                                        $preferensi = [];
                                        $total = 0;
                                    @endphp
                                    <tr>
                                        <td>A{{ $key + 1 }}</td>
                                        <td>{{ $data->nama_penerima }}</td>
                                        <td class="total_preferensi">
                                            @foreach ($kriteria as $k)
                                                @php
                                                    $atribut = $k->atribut;
                                                    $minmax = optional(
                                                        $minmaxValues
                                                            ->where('kode_kriteria', $k->kode_kriteria)
                                                            ->first(),
                                                    )->minmax_value;
                                                    $nilai = optional(
                                                        $data->perhitunganSaw
                                                            ->where('kode_kriteria', $k->kode_kriteria)
                                                            ->first(),
                                                    )->nilai;
                                                    $result =
                                                        $minmax != 0 && $nilai != 0
                                                            ? ($atribut == 'cost'
                                                                ? $minmax / $nilai
                                                                : $nilai / $minmax)
                                                            : 0;
                                                    $preferensi[$k->kode_kriteria] = $result;
                                                @endphp
                                                @php
                                                    $total += $result;
                                                @endphp
                                            @endforeach
                                            {{ $total }}
                                        </td>
                                        <td class="total_persentase">

                                        </td>
                                    </tr>
                                    @php
                                        $no++;
                                        $total_all += $total;
                                    @endphp
                                @endforeach
                                <tr>
                                    <th colspan="2"></th>
                                    <th class="total_all">{{ $total_all }}</th>
                                    <th class="total_all_persentase">100%</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('penyalurandana.store') }}" method="post">
                                @csrf

                                <input type="hidden" name="tgl_perhitungan" value="{{ $tgl_perhitungan }}">
                                <input type="hidden" name="jenis_zakat" value="{{ $jenis_zakat }}">
                                <input type="hidden" name="cabang_id" value="{{ $cabang_id }}">
                                <table class="table table-bordered mt-4  table-striped">
                                    <thead>
                                        <tr class="bg-dark text-light">
                                            <th colspan="8">Hasil Perhitungan SAW dan pembagian zakat :
                                                {{ $jenis_zakat }}</th>
                                        </tr>
                                        <tr>
                                            <th scope="col">Nama Penerima</th>
                                            <th scope="col">
                                                {{ $kriteria->where('kode_kriteria', 'C1')->first()->nama }}
                                            </th>
                                            <th scope="col">
                                                {{ $kriteria->where('kode_kriteria', 'C2')->first()->nama }}
                                            </th>
                                            <th scope="col">
                                                {{ $kriteria->where('kode_kriteria', 'C3')->first()->nama }}
                                            </th>
                                            <th scope="col">
                                                {{ $kriteria->where('kode_kriteria', 'C4')->first()->nama }}
                                            </th>
                                            <th scope="col">Preferensi</th>
                                            <th scope="col">Persentase Pembagian (100%)</th>
                                            @if (empty(
                                                    $penyalurandana->where('jenis_zakat', $jenis_zakat)->where('tgl_perhitungan', $tgl_perhitungan)->whereHas('penerimaZakat', function ($query) use ($cabang_id) {
                                                            $query->where('cabang_id', $cabang_id);
                                                        })->first()
                                                ))
                                                <th scope="col">Dana Tersedia : <span
                                                        class="dana_tersedia">{{ format_rupiah(getTotalDana($jenis_zakat, $cabang_id)) }}</span>
                                                </th>
                                            @else
                                                <th scope="col">Dana Tersalurkan
                                                </th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @php $total_all = 0; @endphp
                                        @foreach ($datas as $key => $data)
                                            @php
                                                $preferensi = [];
                                                $total = 0;
                                            @endphp
                                            <tr>
                                                <td>{{ $data->nama_penerima }}</td>
                                                <td>
                                                    {{ optional($data->perhitunganSaw->where('kode_kriteria', 'C1')->where('tgl_perhitungan', $tgl_perhitungan)->first())->kriteriadetailnilai->keterangan }}
                                                </td>

                                                <td>
                                                    {{ optional($data->perhitunganSaw->where('kode_kriteria', 'C2')->where('tgl_perhitungan', $tgl_perhitungan)->first())->kriteriadetailnilai->keterangan }}
                                                </td>

                                                <td>
                                                    {{ optional($data->perhitunganSaw->where('kode_kriteria', 'C3')->where('tgl_perhitungan', $tgl_perhitungan)->first())->kriteriadetailnilai->keterangan }}
                                                    orang
                                                </td>

                                                <td>
                                                    {{ optional($data->perhitunganSaw->where('kode_kriteria', 'C4')->where('tgl_perhitungan', $tgl_perhitungan)->first())->kriteriadetailnilai->keterangan }}
                                                </td>


                                                <td class="total_preferensi2">
                                                    @foreach ($kriteria as $k)
                                                        @php
                                                            $atribut = $k->atribut;
                                                            $minmax = optional(
                                                                $minmaxValues
                                                                    ->where('kode_kriteria', $k->kode_kriteria)
                                                                    ->first(),
                                                            )->minmax_value;
                                                            $nilai = optional(
                                                                $data->perhitunganSaw
                                                                    ->where('kode_kriteria', $k->kode_kriteria)
                                                                    ->first(),
                                                            )->nilai;
                                                            $result =
                                                                $minmax != 0 && $nilai != 0
                                                                    ? ($atribut == 'cost'
                                                                        ? $minmax / $nilai
                                                                        : $nilai / $minmax)
                                                                    : 0;
                                                            $preferensi[$k->kode_kriteria] = $result;
                                                        @endphp
                                                        @php
                                                            $total += $result;
                                                        @endphp
                                                    @endforeach
                                                    {{ $total }}
                                                </td>
                                                <td class="total_persentase_pembagian"></td>
                                                <td>
                                                    @if (empty(
                                                            $penyalurandana->where('jenis_zakat', $jenis_zakat)->where('tgl_perhitungan', $tgl_perhitungan)->whereHas('penerimaZakat', function ($query) use ($cabang_id) {
                                                                    $query->where('cabang_id', $cabang_id);
                                                                })->first()
                                                        ))
                                                        <span class="total_dana_diterima"></span>

                                                        <input type="hidden" name="penerima_id[]"
                                                            value="{{ $data->id }}">
                                                        <input type="hidden" class="total_dana_diterima_form"
                                                            name="total_dana_diterima_form[]">
                                                        <input type="hidden" class="total_persentase"
                                                            name="total_persentase[]">
                                                    @else
                                                        Rp
                                                        {{ format_rupiah($penyalurandana2->where('penerima_id', $data->id)->first()->total_dana_diterima) }}
                                                    @endif

                                                </td>

                                            </tr>


                                            @php
                                                $no++;
                                                $total_all += $total;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <th colspan="5"></th>
                                            <th class="total_all2">{{ $total_all }}</th>
                                            <th class="total_all_persentase2">100%</th>
                                            <th>
                                                <!-- Add a submit button to submit the form -->
                                                @if (empty(
                                                        $penyalurandana->where('jenis_zakat', $jenis_zakat)->where('tgl_perhitungan', $tgl_perhitungan)->whereHas('penerimaZakat', function ($query) use ($cabang_id) {
                                                                $query->where('cabang_id', $cabang_id);
                                                            })->first()
                                                    ))
                                                    <button type="submit" class="btn btn-primary btn-xs">Simpan & Proses
                                                        Penyaluran Dana</button>
                                                @else
                                                    <a href="{{ route('penyalurandana.batal', [
                                                        'jenis_zakat' => $jenis_zakat,
                                                        'tgl_perhitungan' => $tgl_perhitungan,
                                                        'cabang_id' => $cabang_id,
                                                    ]) }}"
                                                        class="btn btn-danger btn-xs">Batalkan Penyaluran Dana</a>
                                                @endif

                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
