@extends('layout.master')
@section('js')
    <script type="text/javascript">
        $('#cabang_id').on('change', function(e) {
            $(this).closest('form').submit();
        });
    </script>
@stop
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Dana Zakat</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Dana Zakat</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="col-12">
                            <form class="form-inline" action="{{ url('dana-zakat') }}" method="get">
                                <select class="form-control" name="cabang_id" id="cabang_id" required>
                                    <option value="">Pilih Kantor</option>
                                    @foreach ($cabangs as $cabang)
                                        <option value="{{ $cabang->id }}" {{ $cabang_id == $cabang->id ? 'selected' : '' }}>
                                            {{ $cabang->kategori }} / {{ $cabang->nama_kantor }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($cabang_id)
                            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                                @foreach (['Fakir', 'Miskin', 'Amil', 'Mualaf', 'Riqab', 'Gharim', 'Fisabillah', 'Ibnu Sabil'] as $kategori)
                                    <div class="col">
                                        <div class="card radius-10">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-secondary">Dana {{ $kategori }} Tersedia</p>
                                                        <h4 class="my-1">
                                                            {{ format_rupiah(getTotalDana($kategori, $cabang_id)) }}</h4>
                                                        <p class="mb-0 font-13 text-success"><i
                                                                class="bx bx-time align-middle"></i>
                                                            {{ getLastUpdateDana($kategori, $cabang_id) }}</p>
                                                    </div>
                                                    <div class="widgets-icons bg-light-success text-success ms-auto"><i
                                                            class="bx bxs-wallet"></i>
                                                    </div>
                                                </div>
                                                <a href="{{ route('penyalurandana.index', ['jenis_zakat' => $kategori, 'cabang_id' => $cabang_id]) }}"
                                                    class="btn btn-primary mt-3">Lihat Penyaluran</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h2>Silahkan pilih kantor</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
