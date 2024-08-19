@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.rupiahInput').mask('000.000.000.000.000', {
                reverse: true
            });
        });
    </script>

    <script>
        function handleChange(selectElement) {
            // Get the selected value
            var selectedValue = selectElement.value;

            // Select the second select element
            var kategorisZakat = document.getElementById('kategorisZakat');
            var kategorisPengeluaran = document.getElementById('kategorisPengeluaran');

            // Show or hide the second select based on the selected value of the first select
            if (selectedValue === 'Debit') {
                kategorisZakat.style.display = 'none';
              //  kategorisPengeluaran.style.display = 'block';
            } else {
                kategorisZakat.style.display = 'block';
              // kategorisPengeluaran.style.display = 'none';
            }
        }
    </script>
@stop
@section('css')

@stop


@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Jurnal</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Jurnal </li>
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
                            <h5 class="mb-0 text-primary">Form Tambah Jurnal</h5>
                        </div>
                        <hr>
                        <form class="row g-3" action="{{ route('jurnal.store') }}" method="post">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Jenis</label>
                                {{-- <input type="text" readonly value="Kredit"  class="form-control" name="jenis" > --}}

                                <select required name="jenis" class="form-select" onchange="handleChange(this)">
                                    <option value="">Pilih</option>
                                    <option value="Kredit">Kredit</option>
                                    <option value="Debit">Debit</option>
                                </select>
                            </div>


                            <div class="col-12">
                                <label class="form-label">Alokasi Dana</label>
                                <select class="form-control" name="kategoridana_id" id="kategorisZakatx" required>
                                    @foreach ($kategorisZakat as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $kategori->jenis_dana == 'Bagi Dana Zakat Otomatis' ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>

                                <!--  <select class="form-control" name="kategoridana_id" id="kategorisPengeluaran" required style="display:none;">
                                
                                </select> -->
                            </div>

                            <div class="col-12">
                                <label class="form-label">Tgl Transaksi</label>
                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control" name="tgl_transaksi"
                                    required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">No. Ref</label>
                                <input type="text" class="form-control" name="no_ref">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Bank</label>
                                <input type="text" class="form-control" name="bank">
                            </div>
                            <div class="col-12">
                                <label class="form-label">No. Akun</label>
                                <input type="text" class="form-control" name="nomor_akun">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Nama Akun</label>
                                <input type="text" class="form-control" name="nama_akun">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Keterangan</label>
                                <input type="text" class="form-control" name="keterangan">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Anggaran</label>
                                <input type="text" class="form-control rupiahInput" name="anggaran">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Program</label>
                                <input type="text" class="form-control" name="program">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Kantor</label>
                                <select class="form-control" name="cabang_id" required>
                                    <option value="">Pilih Kantor</option>
                                    @foreach ($cabangs as $cabang)
                                        <option value="{{ $cabang->id }}">{{ $cabang->kategori }} /
                                            {{ $cabang->nama_kantor }}</option>
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
