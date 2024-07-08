@extends('layouts.admin')
@section('title', 'Cập nhật Chủ đề bài viết')
@section('content')
    <div class="content">
        <section class="content-header my-2">
            <h1 class="d-inline text-primary">Cập nhật Chủ đề bài viết</h1>
            <hr style="border: none;" />
            <div class="text-end">
                <a href="{{ route('admin.topic.index') }}" class="btn btn-sm btn-success">
                    <i class="fa fa-arrow-left"></i> Vê danh sách
                </a>
            </div>
        </section>

        <section class="content-body my-2">
            <div class="row" style="padding-left: 20px;padding-right: 20px;">
                <form action="{{ route('admin.topic.update', ['id' => $row->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label><strong>Tên chủ đề (*)</strong></label>
                        <input type="text" name="name" class="form-control" placeholder="Tên chủ để"
                            value="{{ old('name', $row->name) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class=" mb-3">
                        <label>
                            <strong>Tên slug (*)</strong>
                        </label>
                        <input type="text" name="slug" placeholder="Nhập tên slug"
                            value="{{ old('slug', $row->slug) }}" class="form-control">
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label><strong><strong>Mô tả</strong></strong></label>
                        <textarea name="description" rows="4" class="form-control">{{ old('description', $row->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label><strong>Trạng thái</strong></label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $row->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                            <option value="2" {{ $row->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                        </select>
                    </div>
                    <div class="mb-3 text-end">
                        <button class="btn btn-sm btn-success" type="submit" name="THEM">
                            <i class="fa fa-save"></i> Lưu[Cập nhật]
                        </button>
                    </div>
                </form>
            </div>
        </section>

    </div>
    <!--END CONTENT-->
@endsection
