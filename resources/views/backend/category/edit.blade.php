@extends('layouts.admin')
@section('title', 'Cập nhật danh mục')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-success">Cập nhật danh mục</h1>
            <div class="text-end">
                <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-success">
                    <i class="fa fa-arrow-left"></i>Về danh sách
                </a>
            </div>
        </section>
        <form action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="text-end">
                <button type="submit" class="btn btn-success btn-sm text-end" name="CAPNHAT">
                    <i class="fa fa-save" aria-hidden="true"></i> Câp nhật
                </button>
            </div>

            <section class="content-body my-2">
                <input name="id" value="" type="hidden">
                <div class="mb-3">
                    <label><strong>Tên danh mục (*)</strong></label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}" id="name"
                        value="" class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label><strong>Slug</strong></label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $category->slug) }}"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label><strong>Mô tả</strong></label>
                    <textarea name="description" rows="7" class="form-control">{{ old('description', $category->description) }}</textarea>
                </div>


                <div class="box-container mt-4 bg-white">
                    <div class="box-header py-1 px-2 border-bottom">
                        <strong>Đăng</strong>
                    </div>
                    <div class="box-body p-2 border-bottom">
                        <p>Chọn trạng thái đăng</p>
                        <select name="status" class="form-control">
                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                            <option value="2" {{ $category->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>

                        </select>
                    </div>
                </div>
                <div class="box-container mt-4 bg-white">
                    <div class="box-header py-1 px-2 border-bottom">
                        <strong>Danh mục cha (*)</strong>
                    </div>
                    <div class="box-body p-2">
                        <select name="parent_id" class="form-control">
                            <option value="0">None</option>
                            {!! $html_parent_id !!}
                        </select>
                    </div>
                </div>
                <div class="box-container mt-4 bg-white">
                    <div class="box-header py-1 px-2 border-bottom">
                        <strong>Thứ tự</strong>
                    </div>
                    <div class="box-body p-2">
                        <select name="sort_order" class="form-control">
                            <option value="0">Chọn vị trí</option>
                            {!! $html_sort_order !!}
                        </select>
                    </div>
                </div>
                <div class="box-container mt-4 bg-white">
                    <div class="box-header py-1 px-2 border-bottom">
                        <strong>Hình (*)</strong>
                    </div>
                    <div class="box-body p-2 border-bottom">
                        <input type="file" name="image" class="form-control" />
                    </div>
                </div>

            </section>
        </form>
    </div>
@endsection
