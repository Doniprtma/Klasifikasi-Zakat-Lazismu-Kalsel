@extends('layout.master')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Pengaturan Dana</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pengaturan Dana
                        </li>
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
                                <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">Fakir</th>
                                            <th scope="col">Miskin</th>
                                            <th scope="col">Amil</th>
                                            <th scope="col">Mualaf</th>
                                            <th scope="col">Riqab</th>
                                            <th scope="col">Gharim</th>
                                            <th scope="col">Fisabillah</th>
                                            <th scope="col">Ibnu Sabil</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$data->fakir}} %</td>
                                            <td>{{$data->miskin}} %</td>
                                            <td>{{$data->amil}} %</td>
                                            <td>{{$data->mualaf}} %</td>
                                            <td>{{$data->riqab}} %</td>
                                            <td>{{$data->gharim}} %</td>
                                            <td>{{$data->fisabillah}} %</td>
                                            <td>{{$data->ibnu_sabil}} %</td>
                                            
                                            <td>
                                                <div class="btn-group">
                                                     
                                                      <a href="{{route('pengaturandana.edit', $data->id)}}">
                                                            <button class="btn btn-edit fas fa-edit btn-info"></button>
                                                        </a>
                                                 
                                                       


                                                    </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table></div>
                            </div>
                        </div>
        </div>

    </div>
</div>
@endsection