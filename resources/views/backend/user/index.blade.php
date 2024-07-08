@extends('layouts.admin')
@section('title', 'Quản lý Thành viên')
@section('content')
    <!--CONTENT  -->
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline">Thành viên</h1>
            <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-success">Thêm mới</a>
            <a href="{{ route('admin.user.trash') }}" class="btn btn-sm btn-danger">Thùng rác</a>
        </section>
        <section class="content-body my-2">
            @includeIf('backend.message')
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30px;">
                            <input type="checkbox" id="checkAll" />
                        </th>
                        <th class="text-center" style="width:90px;">Hình ảnh</th>
                        <th>Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Đối tượng</th>
                        <th>Chuc nang</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tbody>
                        <tr class="datarow">
                            @php
                                $args = ['id' => $user->id];
                            @endphp
                            <td>
                                <input type="checkbox" id="checkId" value="{{ $user->id }}" />
                            </td>
                            <td>
                                <img class="img-fluid" src="../public/images/user/" alt="">
                            </td>
                            <td>
                                <div class="name">
                                    <a href="index.php?opt=user&cat=edit">
                                        {{ $user->name }}
                                    </a>
                                </div>
                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->roles }}</td>
                            <td>
                                @if ($user->status == 1)
                                    <a href="{{ route('admin.user.status', $args) }}" class="btn btn-sm btn-success ">
                                        <i class="fa fa-toggle-on"></i> hiện
                                    </a>
                                @else
                                    <a href="{{ route('admin.user.status', $args) }}" class="btn btn-sm btn-danger ">
                                        <i class="fa fa-toggle-off"></i> ẩn
                                    </a>
                                @endif

                                <a href="{{ route('admin.user.edit', $args) }}" class="btn btn-sm btn-primary ">
                                    <i class="fa fa-edit"></i> chỉnh sửa
                                </a>
                                <a href="{{ route('admin.user.show', $args) }}" class="btn btn-sm btn-info ">
                                    <i class="fa fa-eye"></i> chi tiết
                                </a>
                                <a href="{{ route('admin.user.delete', $args) }}" class="btn btn-sm btn-danger ">
                                    <i class="fa fa-trash"></i> xóa
                                </a>
                                </a>
                            </td>
                            <td class="text-center" style="width:30px;">{{ $user->id }}</td>
                        </tr>
                    </tbody>
                @endforeach

            </table>

        </section>
    </div>
@endsection
