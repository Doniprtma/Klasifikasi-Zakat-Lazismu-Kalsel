@extends('layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Kantor</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Kantor
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="col">
                <div class="card">
                    <div class="card-header">

                        <a href="{{ route('cabang.create') }}" class="btn btn-success"> &nbsp;<i class="fa fa-plus"></i></a>
                    </div>
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
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Nama Kantor</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no=1; @endphp
                                    @foreach ($datas as $data)
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $data->kategori }}</td>
                                            <td>{{ $data->nama_kantor }}</td>

                                            <td>
                                                <div class="btn-group">

                                                    <a href="{{ route('cabang.edit', $data->id) }}">
                                                        <button class="btn btn-edit fas fa-edit btn-info"></button>
                                                    </a>
                                                    &nbsp;
                                                    <form action="{{ route('cabang.destroy', $data->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-sm " type="submit"
                                                            onclick="return confirm('anda yakin ingin menghapus data ini?')"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>




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
