<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Perhitungan SAW</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: A4
        }

        .table {
            font-size: 12px;
        }
    </style>
</head>

<body class="A4" onload="window.print()">

    <section class="sheet padding-10mm">
        <div class="text-center mb-4">
            <img src="{{ asset('T4/assets/images/umbjm.png') }}" alt="Logo" style="height: 60px;">
            <h4 class="mt-2">Lazismu - Kalimantan Selatan</h4>
            <p class="mt-2">Periode : {{ tgl_indo($tgl_perhitungan) }}</p>
        </div>

        @foreach ($groupedDatas as $jenis_zakat => $datas)
            <h2>{{ $jenis_zakat }}</h2>
            <p>Berikut adalah penerima zakat {{ $jenis_zakat }} sesuai dengan perhitungan dengan metode SAW:</p>

            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tgl Perhitungan</th>
                        <th scope="col">Nama Penerima</th>
                        <th scope="col">Jenis Zakat</th>
                        <th scope="col">Total Dana Disalurkan</th>
                        <th scope="col">Persentase</th>
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
                            <td>{{ $data->persentase }}</td>
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
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        @endforeach

        <table class="table table-bordered" style="width: 200px; font-size: 11px; float: right; margin-top: 20px;">
            <tr>
                <th colspan="1">
                    Mengetahui, <br>
                    Ketua BP Lazismu Kalimantan Selatan
                </th>
            </tr>
            <tr style="height: 100px;">
                <td style="width: 50%"></td>
            </tr>
            <tr>
                <td>Erie Norrahman, S.E<br></td>
            </tr>
        </table>
    </section>
</body>

</html>
