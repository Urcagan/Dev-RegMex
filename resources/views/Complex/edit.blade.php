@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать комплекс (EDIT)</h1>
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
                <div class="col-sm-6">
                    <form action="{{ route('complex.update', $complex->id) }}" method="post">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label>Название комплекса</label>
                            <input type="text" name="Name" value="{{ $complex->Name }}" class="form-control" placeholder="Аббревиатура комплекса *">
                            @error('Name')
                                <div class="text-danger">{{$message}}</div>                                
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Описание</label>
                            <textarea type="text" name="Description" class="form-control" rows="4" placeholder="Расщифровка названия">{{ $complex->Description }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Редактировать">
                        </div>
                    </form>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
