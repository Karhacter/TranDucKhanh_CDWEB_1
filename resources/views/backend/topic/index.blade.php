@extends('layouts.admin')
@section('title', 'Quản lý Chủ đề bài viết')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-success">Chủ đề bài viết</h1>
            <hr style="border: none;" />
        </section>
        <div class="text-end">
            <a href="{{ route('admin.topic.trash') }}" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i> Thùng rác
            </a>
        </div>
        <section class="content-body my-2">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{ route('admin.topic.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label><strong>Tên chủ đề (*)</strong></label>
                            <input type="text" name="name" class="form-control" placeholder="Tên chủ để"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" mb-3">
                            <label>
                                <strong>Tên slug (*)</strong>
                            </label>
                            <input type="text" name="slug" placeholder="Nhập tên slug" value="{{ old('slug') }}"
                                class="form-control">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label><strong><strong>Mô tả</strong></strong></label>
                            <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label><strong>Trạng thái</strong></label>
                            <select name="status" class="form-control">
                                <option value="1">Xuất bản</option>
                                <option value="2">Chưa xuất bản</option>
                            </select>
                        </div>
                        <div class="mb-3 text-end">
                            <button class="btn btn-sm btn-success" type="submit" name="THEM">
                                <i class="fa fa-save"></i> Lưu[Cập nhật]
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
                                <th>Tên chủ đề</th>
                                <th>Tên slug</th>
                                <th>Chuc nang</th>
                                <th class="text-center" style="width:30px;">ID</th>
                            </tr>
                        </thead>
                        @foreach ($topics as $topic)
                            <tbody>
                                <tr class="datarow">
                                    @php
                                        $args = ['id' => $topic->id];
                                    @endphp
                                    <td>
                                        <input type="checkbox" id="checkId" value="{{ $topic->id }}" />
                                    </td>
                                    <td>
                                        <div class="name">
                                            <a href="index.php?opt=topic&cat=edit">
                                                {{ $topic->name }}
                                            </a>
                                        </div>

                                    </td>
                                    <td> {{ $topic->slug }}</td>
                                    <td>
                                        @if ($topic->status == 1)
                                            <a href="{{ route('admin.topic.status', $args) }}"
                                                class="btn btn-sm btn-success ">
                                                <i class="fa fa-toggle-on"></i> hiện
                                            </a>
                                        @else
                                            <a href="{{ route('admin.topic.status', $args) }}"
                                                class="btn btn-sm btn-danger ">
                                                <i class="fa fa-toggle-off"></i> ẩn
                                            </a>
                                        @endif

                                        <a href="{{ route('admin.topic.edit', $args) }}"
                                            class="btn btn-sm btn-primary ">
                                            <i class="fa fa-edit"></i> chỉnh sửa
                                        </a>
                                        <a href="{{ route('admin.topic.show', $args) }}"
                                            class="btn btn-sm btn-info ">
                                            <i class="fa fa-eye"></i> chi tiết
                                        </a>
                                        <a href="{{ route('admin.topic.delete', $args) }}"
                                            class="btn btn-sm btn-danger ">
                                            <i class="fa fa-trash"></i> xóa
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $topic->id }}</td>
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
