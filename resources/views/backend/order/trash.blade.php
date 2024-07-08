@extends('layouts.admin')
@section('title', 'Thùng rác menu')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-danger">Thùng rác menu</h1>
            <div class="text-end">
                <a href="{{ route('admin.order.index') }}" class="btn btn-sm btn-danger">
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
                                <div class="function_style">
                                    <a href="{{ route('admin.order.show', $args) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i> Chi tiết
                                    </a>
                                    <a href="{{ route('admin.order.restore', $args) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-undo"></i> Khôi phục
                                    </a>
                                    <form action="{{ route('admin.order.destroy', $args) }}" method="post"
                                        class=" d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger ">
                                            <i class="fa fa-trash"></i> Xóa Hoàn toàn
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="text-center">{{ $order->id }}</td>
                        </tr>

                    </tbody>
                @endforeach
            </table>
        </section>
    </div>
    <!--END CONTENT-->
@endsection
