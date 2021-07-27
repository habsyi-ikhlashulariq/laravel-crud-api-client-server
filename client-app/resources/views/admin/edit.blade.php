@extends('layout.app')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update data</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form update Matakuliah</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @foreach($data as $matakuliah)
              <form action="{{route('matakuliah.update')}}" method="post">
              {{ method_field('PUT') }}
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Mata Kuliah</label>
                    <input type="text" name="txtkodematakuliah" class="form-control"  placeholder="Masukan Kode Mata Kuliah" value="{{ $matakuliah['kodematakuliah'] }}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mata Kuliah</label>
                    <input type="text" name="txtmatakuliah" class="form-control"  placeholder="Masukan Mata Kuliah" value="{{ $matakuliah['matakuliah'] }}">
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <input type="hidden" name="id" value="{{ $matakuliah['id'] }}">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              @endforeach
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection