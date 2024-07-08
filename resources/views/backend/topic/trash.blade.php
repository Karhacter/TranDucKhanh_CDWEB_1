@extends('layouts.admin')
@section('title', 'Thùng rác Bài viết')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-danger"> Thùng rác Bài viết</h1>
            <div class="text-end">
                <a href="{{ route('admin.topic.index') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-arrow-left"></i> Về danh sách
                </a>
            </div>
        </section>
        <section class="content-body my-2">
            @includeIf('backend.message')
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30px;">
                            <input type="checkbox" id="checkboxAll" />
                        </th>
                        <th>Tiêu đề bài viết</th>
                        <th>Tên slug</th>
                        <th>Chuc nang</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                @foreach ($topics as $topic)
                    <tbody>
                        <tr class="datarow">
                            @php
                                $args = ['id' => $topic->id];
                            @endphp
                            <td class="text-center">
                                <input type="checkbox" value="{{ $topic->id }}" />
                            </td>
                            <td>
                                <div class="name">
                                    <a href="#">
                                        {{ $topic->name }}
                                    </a>
                                </div>

                            </td>
                            <td>{{ $topic->slug }}</td>
                            <td>
                                <div class="function_style">
                                    <a href="{{ route('admin.topic.show', $args) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i> Chi tiết
                                    </a>
                                    <a href="{{ route('admin.topic.restore', $args) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-undo"></i> Khôi phục
                                    </a>
                                    <form action="{{ route('admin.topic.destroy', $args) }}" method="post"
                                        class=" d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger ">
                                            <i class="fa fa-trash"></i> Xóa Hoàn toàn
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="text-center">{{ $topic->id }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </section>
    </div>
@endsection
