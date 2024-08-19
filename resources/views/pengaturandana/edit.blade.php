@section('js')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      updateTotal();
    });
   
    function updateTotal() {
      var total = 0;

      for (var i = 1; i <= 8; i++) {
        var inputId = 'percentage' + i;
        var inputValue = parseFloat(document.getElementById(inputId).value.replace(',', '.')) || 0;
        total += inputValue;
      }

      // Gantikan koma dengan titik untuk memastikan desimal
      total = parseFloat(total.toString().replace(',', '.'));

      if (total > 100 || total < 100) {
        document.getElementById('totalError').innerText = 'Total persentase harus sama dengan 100%.';
        document.getElementById('submitButton').disabled = true;
      } else {
        document.getElementById('totalError').innerText = '';
        document.getElementById('submitButton').disabled = false;
      }

      document.getElementById('totalPercentage').value = total.toFixed(2) + '%';
    }
  </script>
@endsection


@section('css')
      <style>
    .error {
      color: red;
    }
  </style>
@endsection

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
                </li> <li class="breadcrumb-item active" aria-current="page">Edit Pengaturan Dana</li>
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
                        <h5 class="mb-0 text-primary">Form Edit Pengaturan Dana</h5>
                    </div>
                    <hr>
                    <form class="row g-3" id="percentageForm" action="{{route('pengaturandana.update', $data->id)}}" method="post">
                          @csrf
                         @method('put')
                        <div class="col-12">
                            <label class="form-label">Fakir</label>
                            <!-- <input type="text"   class="form-control" name="nama" value="{{$data->nama}}" required autofocus> -->
                            <input type="text" id="percentage1" class="percentage form-control" min="0" max="100" name="fakir" value="{{$data->fakir}}" required>

                        </div>
                        <div class="col-12">
                            <label class="form-label">Miskin</label>
                            <input type="text" id="percentage2" class="percentage form-control" onkeyup="updateTotal()" min="0" max="100" name="miskin" value="{{$data->miskin}}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Amil</label>
                            <input type="text" id="percentage3" class="percentage form-control" onkeyup="updateTotal()" min="0" max="100" name="amil" value="{{$data->amil}}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Mualaf</label>
                            <input type="text" id="percentage4" class="percentage form-control" onkeyup="updateTotal()" min="0" max="100" name="mualaf" value="{{$data->mualaf}}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Riqab</label>
                            <input type="text" id="percentage5" class="percentage form-control" onkeyup="updateTotal()" min="0" max="100" name="riqab" value="{{$data->riqab}}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Gharim</label>
                            <input type="text" id="percentage6" class="percentage form-control" onkeyup="updateTotal()" min="0" max="100" name="gharim" value="{{$data->gharim}}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Fisabillah</label>
                            <input type="text" id="percentage7" class="percentage form-control" onkeyup="updateTotal()" min="0" max="100" name="fisabillah" value="{{$data->fisabillah}}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Ibnu Sabil</label>
                            <input type="text" id="percentage8" class="percentage form-control" onkeyup="updateTotal()" min="0" max="100" name="ibnu_sabil" value="{{$data->ibnu_sabil}}" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Total</label>
                            <input type="text" id="totalPercentage" class="percentage form-control" onkeyup="updateTotal()"  readonly>  
                            <p id="totalError" class="error"></p>

                        </div>
                        <div class="col-12 mt-5">
                            <button type="submit" class="btn btn-primary px-5" id="submitButton" disabled>Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection