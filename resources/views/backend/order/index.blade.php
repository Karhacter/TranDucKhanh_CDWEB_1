@extends('layouts.admin')
@section('title', 'Quản lý đơn hàng')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline">Quản lý đơn hàng</h1>
            <a href="{{ route('site.product.index') }}" class="btn btn-sm btn-success">Thêm mới</a>
            <a href="{{ route('admin.order.trash') }}" class="btn btn-sm btn-danger">Thùng rác</a>
        </section>
        <section class="content-body my-2">
            @includeIf('backend.message')

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30px;">
                            <input type="checkbox" id="checkboxAll" />
                        </th>
                        <th>Họ tên khách hàng</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Ngày đặt hàng</th>
                        <th>Chuc nang</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                @foreach ($orders as $order)
                    <tbody>
                        <tr class="datarow">
                            @php
                                $args = ['id' => $order->id];
                            @endphp
                            <td>
                                <input type="checkbox" id="checkId" value="{{ $order->id }}" />
                            </td>
                            <td>
                                <div class="name">
                                    <a href="index.php?opt=order&cat=show">
                                        {{ $order->delivery_name }}
                                    </a>
                                </div>
                            </td>
                            <td>{{ $order->delivery_phone }}</td>
                            <td>{{ $order->delivery_email }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                @if ($order->status == 1)
                                    <a href="{{ route('admin.order.status', $args) }}" class="btn btn-sm btn-success ">
                                        <i class="fa fa-toggle-on"></i> hiện
                                    </a>
                                @else
                                    <a href="{{ route('admin.order.status', $args) }}" class="btn btn-sm btn-danger ">
                                        <i class="fa fa-toggle-off"></i> ẩn
                                    </a>
                                @endif

                                <a href="{{ route('admin.order.edit', $args) }}" class="btn btn-sm btn-primary ">
                                    <i class="fa fa-edit"></i> chỉnh sửa
                                </a>
                                <a href="{{ route('admin.order.show', $args) }}" class="btn btn-sm btn-info ">
                                    <i class="fa fa-eye"></i> chi tiết
                                </a>
                                <a href="{{ route('admin.order.delete', $args) }}" class="btn btn-sm btn-danger ">
                                    <i class="fa fa-trash"></i> xóa
                                </a>
                            </td>
                            <td class="text-center">{{ $order->id }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </section>
    </div>
@endsection
