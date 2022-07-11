@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Дабавление поста</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item active">Дабавление поста</li>
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
                    <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group w-25">
                            <input type="text" value="{{ old('title') }}" name="title" class="form-control" placeholder="Введите название">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Добавить превью</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузка</span>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Добавить главное изображение</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label">Выберите изображение</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Загрузка</span>
                                </div>
                            </div>
                        </div>
                        @error('main_image')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group w-50">
                            <label for="">Выберите категорию</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option
                                        {{ $category->id == old('category_id') ? ' selected' : ''}} }}
                                        value="{{ $category->id }}">{{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group w-50">
                            <label>Добавить теги</label>
                            <select name="tag_ids[]" class="select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option
                                        {{ is_array( old('tag_ids') ) && in_array($tag->id, old('tag_ids')) ? ' selected' : '' }}
                                        value="{{ $tag->id }}">{{ $tag->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        @error('tag_ids')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Добавить"></input>
                        </div>
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
