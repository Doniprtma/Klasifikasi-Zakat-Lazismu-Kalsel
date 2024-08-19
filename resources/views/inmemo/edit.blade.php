@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.rupiahInput').mask('000.000.000.000.000', {
                reverse: true
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
                <div class="breadcrumb-title pe-3">In Memo</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit In Memo</li>
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
                            <h5 class="mb-0 text-primary">Form Edit In Memo</h5>
                        </div>
                        <hr>
                        <form class="row g-3" action="{{ route('inmemo.update', $inmemo->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-12">
                                <label class="form-label">Alokasi Dana</label>
                                <select class="form-control" name="kategoridana_id" required>
                                    @foreach ($kategorisZakat as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $inmemo->kategoridana_id == $kategori->id ? 'selected' : '' }}>
                                            {{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Tgl Pengajuan</label>
                                <input type="date" value="{{ $inmemo->tglpengajuan }}" class="form-control"
                                    name="tglpengajuan" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Tgl Penyaluran</label>
                                <input type="date" value="{{ $inmemo->tglpenyaluran }}" class="form-control"
                                    name="tglpenyaluran" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Uraian</label>
                                <input type="text" class="form-control" name="uraian" value="{{ $inmemo->uraian }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Anggaran</label>
                                <input type="text" class="form-control" name="anggaran" value="{{ $inmemo->anggaran }}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Upload File</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Kantor</label>
                                <select class="form-control" name="cabang_id" required>
                                    <option value="">Pilih Kantor</option>
                                    @foreach ($cabangs as $cabang)
                                        <option value="{{ $cabang->id }}"
                                            {{ $inmemo->cabang_id == $cabang->id ? 'selected' : '' }}>
                                            {{ $cabang->kategori }} / {{ $cabang->nama_kantor }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Status</label>
                                <select class="form-control" name="status" required>
                                    <option value="Pending" {{ $inmemo->status == 'Pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="Disetujui" {{ $inmemo->status == 'Disetujui' ? 'selected' : '' }}>
                                        Disetujui</option>
                                    <option value="Ditolak" {{ $inmemo->status == 'Ditolak' ? 'selected' : '' }}>Ditolak
                                    </option>
                                    <option value="Revisi" {{ $inmemo->status == 'Revisi' ? 'selected' : '' }}>Revisi
                                    </option>
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
