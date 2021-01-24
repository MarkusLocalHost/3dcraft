@extends('admin.layouts.layout')

@section('title')
    Теги - Корзина
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Главная</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Корзина тегов блога</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Восстановление тегов</h3>
            </div>
            <div class="card-body">
                @if (count($deleted_tags))
                    <div class="table-responsive">
                        <table class="display" id="tag_table_trash">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Наименование</th>
                                <th>Slug</th>
                                <th>Удален</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deleted_tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->title }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td>{{ $tag->deleted_at }}</td>
                                    <td>
                                        <a href="{{ route('tags.restore', ['tag' => $tag->id]) }}"
                                           class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>В корзине пусто...</p>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#tag_table_trash').DataTable();
        } );
    </script>
@endsection
