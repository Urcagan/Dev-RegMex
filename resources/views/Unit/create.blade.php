@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить агрегат (CREATE)</h1>
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
                    <form action="{{ route('unit.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label>Название агрегата</label>
                            <input type="text" name="Name" class="form-control" placeholder="Название *"
                            value="{{ old('Name')}}">
                            @error('Name')
                                <div class="text-danger">{{$message}}</div>                                
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Описание</label>
                            <textarea type="text" name="Description" class="form-control" rows="4" placeholder="Введите описание ...">{{ old('Description')}}</textarea>
                        </div>

                        <select name= "Plant_id" class="form-control select2 select2-hidden-accessible"
                            style="width: 100%;"data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="">Выберите установку на которой находится агрегат</option>
                            @foreach ($plants as $plant)
                                <option value="{{ $plant->id }}">{{ $plant->Name }}</option>
                            @endforeach
                        </select>
                        @error('Plant_id')
                                <div class="text-danger"> {{$message}}</div>                                
                        @enderror

                        <div class="form-group mt-3">
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </div>

                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
