@extends('layout.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mata Kuliah</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  
  @if (session('message'))
      <div class="alert alert-success" role="alert">
          {{ session('message') }}                        
      </div>
  @endif
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
            <!-- /.card-header -->
            <a href="{{ route('matakuliah.add') }}" class="btn btn-info mb-2">Add data</a>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Matakuliah</th>
                    <th>Matakuliah</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $matakuliah)
                  <tr>
                    <td><?php echo $no=1; $no++; ?></td>
                    <td>{{ $matakuliah['kodematakuliah'] }}</td>
                    <td>{{ $matakuliah['matakuliah'] }}</td>
                    <td>
                      <a href="/matakuliah/{{ $matakuliah['id'] }}" class="btn btn-warning">Edit</a>
                        <a href="/matakuliah/delete/{{ $matakuliah['id'] }}" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endcontent