@extends('layouts.admin')
@section('title')
    {!! $row->name !!}
@endsection
@section('content')
    <!--CONTENT  -->
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-info">Chi Tiết Thành viên </h1>
            <div class="row mt-2 align-items-center">
                <div class="col-md-12 text-end">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                    <a href="{{ route('admin.user.edit', ['id' => $row->id]) }}" class="btn btn-success btn-sm">
                        <i class="fa fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.user.delete', ['id' => $row->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Xóa
                    </a>
                    <a href="{{ route('admin.user.trash') }}" class="btn btn-danger btn-sm">
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
                            Name
                        </td>
                        <td>
                            <?= $row->name ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Email
                        </td>
                        <td>
                            <?= $row->email ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Gender
                        </td>
                        <td>
                            <?= $row->gender ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Phone
                        </td>
                        <td>
                            <?= $row->phone ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Username
                        </td>
                        <td>
                            <?= $row->username ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">
                            Password
                        </td>
                        <td>
                            <?= $row->password ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            Address
                        </td>
                        <td>
                            <?= $row->address ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center">
                            Roles
                        </td>
                        <td>
                            <?= $row->roles ?>
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
    @endsection
