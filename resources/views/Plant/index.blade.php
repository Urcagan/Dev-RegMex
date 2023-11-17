@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Таблица установок (INDEX)</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('plant.create') }}" class="btn btn-primary">Добавить</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Описание</th>
                                        <th>ID</th>
                                        <th>Комплекс</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($plants as $plant) --}}
                                    @foreach ($plants as $plant)
                                        <tr>
                                            <td>
                                                <a href="{{ route('plant.show', $plant->id) }}">{{ $plant->Name }}</a>
                                            </td>
                                            <td>{{ $plant->Description }}</td>
                                            <td>{{ $plant->id }}</td>
                                            {{-- <td>{{ $plant->Complex_id }}</td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
