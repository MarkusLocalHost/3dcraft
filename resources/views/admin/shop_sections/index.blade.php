@extends('admin.layouts.layout')

@section('title')
    Разделы - Управление
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
                        <li class="breadcrumb-item active">Разделы магазина</li>
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
                <h3 class="card-title">Список разделов</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('shop_sections.create') }}" class="btn btn-primary mb-3">Добавить
                    раздел</a>
                @if (count($sections))
                    <div class="table-responsive">
                        <table class="display" id="category_table_index">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Наименование</th>
                                <th>Порядок</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sections as $section)
                                <tr @if($section->deleted_at !== null) style="background-color: #ccc;" @endif>
                                    <td>{{ $section->id }}</td>
                                    <td>{{ $section->title }}</td>
                                    <td>{{ $section->order }}</td>
                                    <td>
                                        <a href="{{ route('shop_sections.edit', ['shop_section' => $section->id]) }}"
                                           class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        @if($section->deleted_at == null)
                                            <form action="{{ route('shop_sections.destroy', ['shop_section' => $section->id]) }}"
                                                  method="post" class="float-left">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Подтвердите удаление')">
                                                    <i
                                                        class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('shop_sections.restore', ['shop_section' => $section->id]) }}"
                                               class="btn btn-info btn-sm float-left mr-1">
                                                <i class="fas fa-check"></i>
                                            </a>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Разделов пока нет...</p>
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
        $(document).ready(function () {
            $('#category_table_index').DataTable();
        });
    </script>
@endsection
