@extends('layouts.admin')
@section('title', 'Thùng rác Thành viên')
@section('content')
    <!--CONTENT  -->
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline">Thành viên</h1>
            <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-success">Về danh
                sách</a>
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
                                <a href="{{ route('admin.user.show', $args) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Chi tiết
                                </a>
                                <a href="{{ route('admin.user.restore', $args) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-undo"></i> Khôi phục
                                </a>
                                <form action="{{ route('admin.user.destroy', $args) }}" method="post" class=" d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger ">
                                        <i class="fa fa-trash"></i> Xóa Hoàn toàn
                                    </button>
                                </form>
                            </td>
                            <td class="text-center" style="width:30px;">{{ $user->id }}</td>
                        </tr>
                    </tbody>
                @endforeach

            </table>

        </section>
    </div>
@endsection
