@extends('layouts.main')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Главная</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">Главная</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <div class="card">
        <div class="card-header">
          <a href="{{ route('complex.create') }}" class="btn btn-primary">Добавить</a>
        </div>

        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>Название</th>
                <th>Описание</th>
              </tr>
            </thead>
            <tbody>
              @foreach($complexes as @complex)
              <tr>
                <td>{{ $complex->Name }}</td>
                <td>{{ $complex->Description }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>


    </div>
    <!-- /.row -->
    <!-- Main row -->

    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection