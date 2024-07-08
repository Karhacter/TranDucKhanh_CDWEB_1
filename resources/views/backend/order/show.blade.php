@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
@section('content')
    <!--CONTENT  -->
    <div class="content container">
        <section class="content-header my-2">
            <h1 class="d-inline text-primary">Chi tiết đơn hàng</h1>
            <div class="mt-1 text-end">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.order.index') }}">
                    <i class="fa fa-arrow-left"></i> Về danh sách
                </a>
            </div>
        </section>
        <section class="content-body my-2">
            <h3 class="font-weight-bold">Thông tin khách hàng</h3>
            <div class="row">
                <div class="col-md">
                    <label><strong>Họ tên (*)</strong></label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control"
                        readonly />
                </div>
                <div class="col-md">
                    <label><strong>Email (*)</strong></label>
                    <input type="text" name="email" value="{{ old('email', $user->email) }}" class="form-control"
                        readonly />
                </div>
                <div class="col-md">
                    <label><strong>Điện thoại (*)</strong></label>
                    <input type="text" name="phone" value="{{ old('phone', $user->phone) }}" class="form-control"
                        readonly />
                </div>
                <div class="col-md-5">
                    <label><strong>Địa chỉ (*)</strong></label>
                    <input type="text" name="address" value="{{ old('address', $user->address) }}" class="form-control"
                        readonly />
                </div>
            </div>

            <h3 class="mt-3 font-weight-bold">Chi tiết giỏ hàng</h3>
            <div class="row my-2">
                <div class="col-3">
                    Tổng tiền: <strong>{{ number_format($totalAmount, 0, ',', '.') }}</strong>
                </div>
                <div class="col-3">
                    Ngày đặt: <strong>{{ $row->created_at }}</strong>
                </div>
                <div class="col-3">
                    Hình thức đặt: <strong>{{ $row->type }}</strong>
                </div>
                <div class="col-3">
                    Trạng thái:
                    @if ($row->status == 2)
                        <strong>Đang thực hiện</strong>
                    @else
                        <strong>Đã hoàn thành</strong>
                    @endif
                </div>
            </div>

            <div class="row my-3">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:90px;">Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th style="width:160px;" class="text-center">Giá</th>
                                <th style="width:90px;" class="text-center">Số lượng</th>
                                <th style="width:160px;" class="text-center">Thành tiền</th>
                            </tr>
                        </thead>
                        @foreach ($products as $product)
                            <tbody>
                                <tr>
                                    <td>
                                        <img class="img-fluid" src="{{ asset('images/products/' . $product->image) }}"
                                            alt="sanpham.jpg" />
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td class="text-center">{{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td class="text-center">{{ $product->qty }}</td>
                                    <td class="text-right">
                                        {{ number_format($product->price * $product->qty, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>

        </section>
    </div>
    <!--END CONTENT-->
@endsection
