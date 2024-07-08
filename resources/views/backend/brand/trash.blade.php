@extends('layouts.admin')
@section('title', 'Thùng rác Danh mục')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-danger"> Thùng rác Thương hiệu</h1>
            <div class="text-end">
                <a href="{{ route('admin.brand.index') }}" class="btn btn-sm btn-danger">
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
                        <th class="text-center" style="width:90px;">Hình ảnh</th>
                        <th>Tên danh mục</th>
                        <th>Tên slug</th>
                        <th>Chuc nang</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                @foreach ($brands as $brand)
                    <tbody>
                        <tr class="datarow">
                            @php
                                $args = ['id' => $brand->id];
                            @endphp
                            <td class="text-center">
                                <input type="checkbox" value="{{ $brand->id }}" />
                            </td>
                            <td>
                                <img class="img-fluid" src="{{ asset('images/brands/' . $brand->image) }}" alt="Image">
                            </td>
                            <td>
                                <div class="name">
                                    <a href="#">
                                        {{ $brand->name }}
                                    </a>
                                </div>

                            </td>
                            <td>{{ $brand->slug }}</td>
                            <td>
                                <div class="function_style">
                                    <a href="{{ route('admin.brand.show', $args) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i> Chi tiết
                                    </a>
                                    <a href="{{ route('admin.brand.restore', $args) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-undo"></i> Khôi phục
                                    </a>
                                    <form action="{{ route('admin.brand.destroy', $args) }}" method="post"
                                        class=" d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger ">
                                            <i class="fa fa-trash"></i> Xóa Hoàn toàn
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="text-center">{{ $brand->id }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </section>
    </div>
@endsection
