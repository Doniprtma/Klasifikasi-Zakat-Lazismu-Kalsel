<!DOCTYPE html>
<html>
<head>
    <title>Cetak Kwitansi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .kwitansi {
            display: flex;
            justify-content: space-between;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #000;
        }
        .kwitansi .left {
            width: 30%;
            font-size: 10px;
        }
        .kwitansi .left img {
            height: 60px;
        }
        .kwitansi .left .details {
            margin-top: 10px;
        }
        .kwitansi .left .details p {
            margin: 2px 0;
            line-height: 1.2;
        }
        .kwitansi .right {
            width: 65%;
        }
        .kwitansi .right h1 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .kwitansi .right .details td {
            padding: 2px 0;
        }
        .kwitansi .signature {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        .kwitansi .signature div {
            width: 45%;
            text-align: center;
        }
        .kwitansi .signature div p {
            margin-top: 40px;
            padding-top: 5px;
        }
    </style>
</head>
<body>
    <div class="kwitansi">
        <div class="left">
            <img src="{{ asset('T4/assets/images/umbjm.png') }}" alt="Logo">
            <div class="details">
                <p>Lazismu - Lembaga Amil Zakat Nasional</p>
                <p>S.K. Menteri Agama RI No. 90 Tahun 2022</p>
                <p>Tanggal 26 Januari 2022</p>
                <p>Gedung PWM Kalimantan Selatan</p>
                <p>Jalan S. Parman Gang Purnama No. 1</p>
                <p>Kota Banjarmasin</p>
                <p>Telepon/Whatsapp: 0811 507 2123</p>
                <p>Email: lazismukalsel@gmail.com</p>
            </div>
        </div>
        <div class="right">
            <h1>KUITANSI</h1>
            <div class="details">
                <table>
                    <tr>
                        <td>Nomor</td>
                        <td>: {{ $penyaluranDana->id }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:  {{ \Carbon\Carbon::parse($penyaluranDana->tgl_penyaluran)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td>Telah dibayarkan kepada</td>
                        <td>: {{ $penyaluranDana->penerimaZakat->nama_penerima }}</td>
                    </tr>
                    <tr>
                        <td>Uang sejumlah</td>
                        <td>: {{ terbilang($penyaluranDana->total_dana_diterima) }} rupiah</td>
                    </tr>
                    <tr>
                        <td>Untuk pembayaran</td>
                        <td>: {{ $penyaluranDana->keterangan }}</td>
                    </tr>
                    <tr>
                        <td>Melalui</td>
                        <td>: {{ $penyaluranDana->cash_transfer }}</td>
                    </tr>
                    <tr>
                        <td>Rp.</td>
                        <td>: Rp {{ number_format($penyaluranDana->total_dana_diterima, 0, ',', '.') }}</td>
                    </tr>
                </table>
            </div>
            <div class="signature">
                <div>
                    <p>Penerima,</p>
                    <p>______________________</p>
                </div>
                <div>
                    <p>Keuangan,</p>
                    <p>______________________</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
