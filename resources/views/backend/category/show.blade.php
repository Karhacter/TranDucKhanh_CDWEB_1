@extends('layouts.admin')
@section('title')
    {!! $category->name !!}
@endsection
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-primary">Chi Tiết Danh Mục </h1>
            <div class="row mt-2 align-items-center">
                <div class="col-md-12 text-end">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                    <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" class="btn btn-success btn-sm">
                        <i class="fa fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.category.delete', ['id' => $category->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Xóa
                    </a>
                    <a href="{{ route('admin.category.trash') }}" class="btn btn-danger btn-sm">
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
                            <?= $category->id ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Name
                        </td>
                        <td>
                            <?= $category->name ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Slug
                        </td>
                        <td>
                            <?= $category->slug ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Image
                        </td>
                        <td>
                            <img src="{{ asset('images/categories/' . $category->image) }}" class="img-fluid w-50"
                                alt="">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Parent_id
                        </td>
                        <td>
                            <?= $category->parent_id ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">
                            Sort_order
                        </td>
                        <td>
                            <?= $category->sort_order ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Description
                        </td>
                        <td>
                            <?= $category->description ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Created_at
                        </td>
                        <td>
                            <?= $category->created_at ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Created_by
                        </td>
                        <td>
                            <?= $category->created_by ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Updated_at
                        </td>
                        <td>
                            <?= $category->updated_at ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Updated_by
                        </td>
                        <td>
                            <?= $category->updated_by ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Status
                        </td>
                        <td>
                            <?= $category->status ?>
                        </td>
                    </tr>

                </tbody>
            </table>
        </section>
    </div>
@endsection
