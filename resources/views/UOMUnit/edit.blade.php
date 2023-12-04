@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать Агрегат (EDIT)</h1>
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
                <div class="col-6">
                    <form action="{{ route('uomunit.update', $uomunit->id) }}" method="post">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <label>Название параметр</label>
                            <input type="text" name="Name" class="form-control" value="{{ $uomunit->Name }}" >
                            @error('Name')
                                <div class="text-danger">{{$message}}</div>                                
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Описание</label>
                            <textarea type="text" name="Description" class="form-control" rows="4" >{{ $uomunit->Description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Аббревиатура</label>
                            <input type="text" name="Abbreviation" class="form-control" value="{{ $uomunit->Abbreviation }}">
                            @error('Abbreviation')
                                <div class="text-danger">{{$message}}</div>                                
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Фактор</label>
                            <input type="text" name="Factor" class="form-control" value="{{ $uomunit->Factor }}">
                            @error('Factor')
                                <div class="text-danger">{{$message}}</div>                                
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-primary" value="Сохранить">
                        </div>

                    </form>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
