@extends('layouts.admin')
@section('content')
    <div class="maincontent bg-light p-3" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h3 class="d-inline text-primary">Thêm Banner</h3>
            <div class="text-end">
                <a href="{{ route('admin.banner.index') }}" class="btn btn-sm btn-success">
                    <i class="fa fa-arrow-left"></i> Về danh sách
                </a>
            </div>
        </section>

        <section class="content-body my-2">
            <form action="{{ route('admin.banner.update', ['id' => $banner->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label>
                                <strong>Tiêu đề Banner (*)</strong>
                            </label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tiêu đề"
                                value="{{ old('name', $banner->name) }}" />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>
                                <strong>Liên kết (*)</strong>
                            </label>
                            <input rows="7" name="link" class="form-control" placeholder="Nhập liên kết"
                                value="{{ old('link', $banner->link) }}" />
                            @error('link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-container mt-4 bg-white">
                            <div class="box-header py-1 px-2 border-bottom">
                                <strong>Đăng</strong>
                            </div>
                            <div class="box-body p-2 border-bottom">
                                <p>Chọn trạng thái đăng</p>
                                <select name='status' class="form-select">
                                    <option value="1" {{ $banner->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                                    <option value="2" {{ $banner->status == 2 ? 'selected' : '' }}>Chưa xuất bản
                                    </option>
                                </select>
                            </div>
                            <div class="box-footer text-end px-2 py-3">
                                <button type="submit" class="btn btn-success btn-sm text-end" name="THEM">
                                    <i class="fa fa-save"></i>
                                    &nbsp; Đăng
                                </button>
                            </div>
                            <div class="box-footer text-start px-2 py-0">
                                <label><strong>Sắp xếp</strong></label>
                                <select name="sort_order" class="form-select">
                                    <option value="0">Chọn vị trí</option>
                                    {!! $html_sort_order !!}
                                </select>
                            </div>
                        </div>
                        <div class="box-container mt-2 bg-white">
                            <div class="box-header py-1 px-2 border-bottom">
                                <strong>Hình đại diện</strong>
                            </div>
                            <div class="box-body p-2 border-bottom">
                                <input type="file" id="image" name="image" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
