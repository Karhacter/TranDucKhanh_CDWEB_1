@extends('layouts.admin')
@section('title')
    {!! $row->name !!}
@endsection
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-info">Chi tiết Bài viết </h1>
            <div class="row mt-2 align-items-center">
                <div class="col-md-12 text-end">
                    <a href="{{ route('admin.post.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                    <a href="{{ route('admin.post.edit', ['id' => $row->id]) }}" class="btn btn-success btn-sm">
                        <i class="fa fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.post.delete', ['id' => $row->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Xóa
                    </a>
                    <a href="{{ route('admin.post.trash') }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Thùng rác
                    </a>
                </div>
            </div>
        </section>
        <section class="content-body my-2">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width:30%">Tên trường</th>
                        <th style="width:70%">Giá trị</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                            Id

                        </td>
                        <td>
                            <?= $row->id ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            title
                        </td>
                        <td>
                            <?= $row->title ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Slug
                        </td>
                        <td>
                            <?= $row->slug ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Image
                        </td>
                        <td>
                            <img src="{{ asset('images/posts/' . $row->image) }}" class="img-fluid w-50" alt="">
                        </td>
                    </tr>


                    <tr>
                        <td class="text-center">
                            type
                        </td>
                        <td>
                            <?= $row->type ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            detail
                        </td>
                        <td>
                            <?= $row->detail ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            description
                        </td>
                        <td>
                            <?= $row->description ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Created_at
                        </td>
                        <td>
                            <?= $row->created_at ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Created_by
                        </td>
                        <td>
                            <?= $row->created_by ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Updated_at
                        </td>
                        <td>
                            <?= $row->updated_at ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Updated_by
                        </td>
                        <td>
                            <?= $row->updated_by ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Status
                        </td>
                        <td>
                            <?= $row->status ?>
                        </td>
                    </tr>

                </tbody>
            </table>
        </section>
    </div>
@endsection
