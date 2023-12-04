@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Единици измерения (UOMUnit INDEX)</h1>
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
                            <a href="{{ route('uomunit.create') }}" class="btn btn-primary">Добавить</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Описание</th>
                                        <th>Аббревиатура</th>
                                        <th>Фактор</th>
                                        <th>ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($plants as $plant) --}}
                                    @foreach ($uomunits as $uomunit)
                                        <tr>
                                            <td>
                                                <a href="{{ route('uomunit.show', $uomunit->id) }}">{{ $uomunit->Name }}</a>
                                            </td>
                                            <td>{{ $uomunit->Description }}</td>
                                            <td>{{ $uomunit->Abbreviation }}</td>
                                            <td type=number>{{ $uomunit->Factor }}</td>
                                            <td>{{ $uomunit->id }}</td>
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
