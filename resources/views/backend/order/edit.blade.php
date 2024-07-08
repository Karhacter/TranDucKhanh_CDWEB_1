@extends('layouts.admin')
@section('title', 'Đơn hàng')
@section('content')
    <div class="container">
        <h3 class="mt-3 font-weight-bold">Chỉnh sửa đơn hàng</h3>


        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.order.index') }} " class="btn btn-sm btn-success ">Về danh sách</a>
        </div>
        <form action="{{ route('admin.order.update', $row->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row my-2">
                <div class="col-6">
                    Tên người nhận: <input type="text" name="delivery_name" value="{{ $row->delivery_name }}"
                        class="form-control">
                </div>
                <div class="col-6">
                    Giới tính:
                    <select name="delivery_gender" class="form-control">
                        <option value="male" {{ $row->delivery_gender == 'male' ? 'selected' : '' }}>Nam</option>
                        <option value="female" {{ $row->delivery_gender == 'female' ? 'selected' : '' }}>Nữ</option>
                        <option value="other" {{ $row->delivery_gender == 'other' ? 'selected' : '' }}>Khác</option>
                    </select>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    Số điện thoại: <input type="text" name="delivery_phone" value="{{ $row->delivery_phone }}"
                        class="form-control">
                </div>
                <div class="col-6">
                    Email: <input type="email" name="delivery_email" value="{{ $row->delivery_email }}"
                        class="form-control">
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    Địa chỉ: <input type="text" name="delivery_address" value="{{ $row->delivery_address }}"
                        class="form-control">
                </div>
                <div class="col-6">
                    Ghi chú: <input type="text" name="note" value="{{ $row->note }}" class="form-control">
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    Hình thức đặt:
                    <select name="type" class="form-control">
                        <option value="online" {{ $row->type == 'online' ? 'selected' : '' }}>Online</option>
                        <option value="offline" {{ $row->type == 'codw' ? 'selected' : '' }}>COD</option>
                    </select>
                </div>
                <div class="col-6">
                    Trạng thái:
                    <select name="status" class="form-control">
                        <option value="1" {{ $row->status == 1 ? 'selected' : '' }}>Đang thực hiện</option>
                        <option value="2" {{ $row->status == 2 ? 'selected' : '' }}>Đang giao</option>
                        <option value="3" {{ $row->status == 3 ? 'selected' : '' }}>Đã giao</option>
                        <option value="4" {{ $row->status == 4 ? 'selected' : '' }}>Đã hủy</option>
                    </select>
                </div>
            </div>

            <h4 class="mt-3 font-weight-bold">Sản phẩm trong đơn hàng</h4>
            @foreach ($orderdetails as $index => $orderdetail)
                <div class="row my-2">
                    @php
                        $product = \App\Models\Product::find($orderdetail->product_id);
                    @endphp
                    @if ($product)
                        <div class="col-3">
                            Sản phẩm: <input type="text" name="products[{{ $index }}][name]"
                                value="{{ $product->name }}" class="form-control" disabled>
                            <input type="hidden" name="orderdetails[{{ $index }}][id]"
                                value="{{ $orderdetail->id }}">
                        </div>
                        <div class="col-3">
                            Số lượng: <input type="number" name="orderdetails[{{ $index }}][qty]"
                                value="{{ $orderdetail->qty }}" class="form-control">
                        </div>
                        <div class="col-3">
                            Giá: <input type="text" name="products[{{ $index }}][price]"
                                value="{{ number_format($product->price) }} đ" id="price-{{ $product->price }}"
                                class="form-control" disabled>
                        </div>
                    @else
                        <div class="col-12">
                            <p class="text-danger">Sản phẩm không tồn tại</p>
                        </div>
                    @endif
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary mt-3">Cập nhật đơn hàng</button>
        </form>
    </div>
@endsection
