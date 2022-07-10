@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Дабавление пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                    <form action="{{ route('admin.user.store') }}" method="post" class="w-25">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Введите имя">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Введите Email">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="password" class="form-control" placeholder="Введите пароль">
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label for="">Выберите роль</label>
                            <select class="form-control" name="role">
                                @foreach($roles as $key => $role)
                                    <option
                                        {{ $key == old('key') ? ' selected' : '' }}
                                        value="{{ $key }}">{{ $role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('role')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="submit" class="btn btn-primary" value="Добавить"></input>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
