@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить Tag Name (CREATE)</h1>
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
                    <form action="{{ route('point.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label>Название точки (Tag Name)</label>
                            <input type="text" name="Name" class="form-control" placeholder="Название *"
                            value="{{ old('Name')}}"
                            >
                            @error('Name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Описание</label>
                            <textarea type="text" name="Description" class="form-control" rows="4" placeholder="Введите описание ..."></textarea>
                        </div>

                        <div class="form-group">
                            <label>Единицы измерения</label>
                            <select name= "UOMUnit_id" class="form-control select2 select2-hidden-accessible"
                                style="width: 32%;"data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Единицы измерения</option>
                                @foreach ($uomunits as $uomunit)
                                    <option value="{{ $uomunit->id }}">{{ $uomunit->Abbreviation }}</option>
                                @endforeach
                            </select>
                            @error('UOMUnit_id')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Принадлежность к оборудованию</label>
                            <select name= "Unit_id" class="form-control select2 select2-hidden-accessible"
                                style="width: 32%;"data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Оборудование</option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}">{{ $unit->Name }}</option>
                                @endforeach
                            </select>
                            @error('Unit_id')
                                <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>

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
