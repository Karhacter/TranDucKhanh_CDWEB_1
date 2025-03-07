@extends('layouts.admin')
@section('title', 'Quản lý Banner')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-success">Banner</h1>
            <div class="text-end">
                <a href="{{ route('admin.banner.create') }}" class="btn btn-sm btn-success">
                    <i class="fa fa-plus"></i> Thêm mới
                </a>
                <a href="{{ route('admin.banner.trash') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Thùng rác
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
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th>Tên banner</th>
                        <th>Vị trí</th>
                        <th>Liên kết</th>
                        <th>Chuc nang</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                @foreach ($banners as $banner)
                    <tbody>
                        <tr class="datarow">
                            @php
                                $args = ['id' => $banner->id];
                            @endphp
                            <td class="text-center">
                                <input type="checkbox" value="{{ $banner->id }}" />
                            </td>
                            <td>
                                <img class="img-fluid" src="../public/images/banner/" alt="">
                            </td>
                            <td>
                                <div class="name">
                                    <a href="index.php?opt=banner&cat=edit&id=">
                                        {{ $banner->name }}
                                    </a>
                                </div>
                            </td>
                            <td>{{ $banner->position }}</td>
                            <td>{{ $banner->link }}</td>
                            <td>
                                @if ($banner->status == 1)
                                    <a href="{{ route('admin.banner.status', $args) }}" class="btn btn-sm btn-success ">
                                        <i class="fa fa-toggle-on"></i> hiện
                                    </a>
                                @else
                                    <a href="{{ route('admin.banner.status', $args) }}" class="btn btn-sm btn-danger ">
                                        <i class="fa fa-toggle-off"></i> ẩn
                                    </a>
                                @endif

                                <a href="{{ route('admin.banner.edit', $args) }}" class="btn btn-sm btn-primary ">
                                    <i class="fa fa-edit"></i> chỉnh sửa
                                </a>
                                <a href="{{ route('admin.banner.show', $args) }}" class="btn btn-sm btn-info ">
                                    <i class="fa fa-eye"></i> chi tiết
                                </a>
                                <a href="{{ route('admin.banner.delete', $args) }}" class="btn btn-sm btn-danger ">
                                    <i class="fa fa-trash"></i> xóa
                                </a>
                            </td>
                            <td class="text-center">{{ $banner->id }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </section>
    </div>
    <!--END CONTENT-->
@endsection
