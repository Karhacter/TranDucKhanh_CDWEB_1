@extends('layouts.admin')
@section('title', 'Quản lý bài viết')
@section('content')
    <!--CONTENT  -->
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-success">Quản lý bài viết</h1>
            <div class="text-end">
                <a href="{{ route('admin.post.create') }}" class="btn btn-sm btn-success">
                    <i class="fa fa-plus"></i> Thêm mới
                </a>
                <a href="{{ route('admin.post.trash') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Thùng rác
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
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th>Tiêu đề bài viết</th>
                        <th>Tên slug</th>
                        <th>Kiểu bài viết </th>
                        <th>Chuc nang</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                @foreach ($posts as $post)
                    <tbody>
                        <tr class="datarow">
                            @php
                                $args = ['id' => $post->id];
                            @endphp
                            <td>
                                <input type="checkbox" id="checkId" value=" {{ $post->id }}" />
                            </td>
                            <td>
                                <img class="img-fluid" src="{{ asset('images/posts/' . $post->image) }}" alt="">
                            </td>
                            <td>
                                <div class="name">
                                    <a href="index.php?opt=post&cat=edit">
                                        {{ $post->title }}
                                    </a>
                                </div>
                            </td>
                            <td> {{ $post->slug }}</td>
                            <td> {{ $post->type }}</td>
                            <td>
                                @if ($post->status == 1)
                                    <a href="{{ route('admin.post.status', $args) }}" class="btn btn-sm btn-success ">
                                        <i class="fa fa-toggle-on"></i> hiện
                                    </a>
                                @else
                                    <a href="{{ route('admin.post.status', $args) }}" class="btn btn-sm btn-danger ">
                                        <i class="fa fa-toggle-off"></i> ẩn
                                    </a>
                                @endif

                                <a href="{{ route('admin.post.edit', $args) }}" class="btn btn-sm btn-primary ">
                                    <i class="fa fa-edit"></i> chỉnh sửa
                                </a>
                                <a href="{{ route('admin.post.show', $args) }}" class="btn btn-sm btn-info ">
                                    <i class="fa fa-eye"></i> chi tiết
                                </a>
                                <a href="{{ route('admin.post.delete', $args) }}" class="btn btn-sm btn-danger ">
                                    <i class="fa fa-trash"></i> xóa
                                </a>
                            </td>
                            <td class="text-center"> {{ $post->id }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>

        </section>
    </div>
    <!--END CONTENT-->
@endsection
