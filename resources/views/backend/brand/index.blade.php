@extends('layouts.admin')
@section('title', 'Quản lý Thuong hieu')
@section('content')
    <div class="content">
        <section class="content-header my-2">
            <h1 class="d-inline">Thương hiệu</h1>
            <hr style="border: none;">
            <div class="text-end">
                <a href="{{ route('admin.brand.trash') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Thùng rác
                </a>
            </div>
        </section>
        <section class="content-body my-2">

            <div class="row" style="padding-left: 20px;padding-right: 20px;">
                <div class="col-md-4">
                    <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>
                                <strong>Tên thương hiệu (*)</strong>
                            </label>
                            <input type="text" name="name" id="name" placeholder="Nhập tên danh mục"
                                class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>
                                <strong>Slug</strong>
                            </label>
                            <input type="text" name="slug" id="slug" placeholder="Nhập tên slug"
                                value="{{ old('slug') }}" class="form-control">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label><strong>Mô tả</strong></label>
                            <textarea name="description" rows="4" class="form-control" placeholder="Mô tả">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label><strong>Sắp xếp</strong></label>
                            <select name="sort_order" class="form-select">
                                <option value="0">Chọn vị trí</option>
                                {!! $html_sort_order !!}
                            </select>
                        </div>
                        <div class="mb-3">
                            <label><strong>Hình đại diện</strong></label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label><strong>Trạng thái</strong></label>
                            <select name="status" class="form-control">
                                <option value="1">Xuất bản</option>
                                <option value="2">Chưa xuất bản</option>
                            </select>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-sm btn-success" name="THEM">
                                <i class="fa fa-save"></i> Lưu[Thêm]
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    @includeIf('backend.message')
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:30px;">
                                    <input type="checkbox" id="checkboxAll" />
                                </th>
                                <th class="text-center" style="width:90px;">Hình ảnh</th>
                                <th>Tên thương hiệu</th>
                                <th>Tên slug</th>
                                <th>Chuc nang</th>
                                <th class="text-center" style="width:30px;">ID</th>
                            </tr>
                        </thead>
                        @foreach ($brands as $row)
                            <tbody>
                                <tr class="datarow">
                                    @php
                                        $args = ['id' => $row->id];
                                    @endphp
                                    <td class="text-center">
                                        <input type="checkbox" name="checkId[]" value="{{ $row->id }}" />
                                    </td>
                                    <td>
                                        <img class="img-fluid" src="{{ asset('images/brands/' . $row->image) }}"
                                            alt="Image">
                                    </td>
                                    <td>
                                        <div class="name">
                                            <a href="#">
                                                {{ $row->name }}
                                            </a>
                                        </div>

                                    </td>
                                    <td>{{ $row->slug }}</td>
                                    <td>
                                        @if ($row->status == 1)
                                            <a href="{{ route('admin.brand.status', $args) }}"
                                                class="btn btn-sm btn-success ">
                                                <i class="fa fa-toggle-on"></i> hiện
                                            </a>
                                        @else
                                            <a href="{{ route('admin.brand.status', $args) }}"
                                                class="btn btn-sm btn-danger ">
                                                <i class="fa fa-toggle-off"></i> ẩn
                                            </a>
                                        @endif

                                        <a href="{{ route('admin.brand.edit', $args) }}"
                                            class="btn btn-sm btn-primary ">
                                            <i class="fa fa-edit"></i> chỉnh sửa
                                        </a>
                                        <a href="{{ route('admin.brand.show', $args) }}"
                                            class="btn btn-sm btn-info ">
                                            <i class="fa fa-eye"></i> chi tiết
                                        </a>
                                        <a href="{{ route('admin.brand.delete', $args) }}"
                                            class="btn btn-sm btn-danger ">
                                            <i class="fa fa-trash"></i> xóa
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $row->id }}</td>
                                </tr>

                            </tbody>
                        @endforeach

                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
