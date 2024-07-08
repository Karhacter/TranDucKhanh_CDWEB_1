@extends('layouts.admin')
@section('title', 'Quản lý menu')
@section('content')
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-success">Quản lý menu</h1>
            <div class="text-end">
                <a href="{{ route('admin.menu.trash') }}" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Thùng rác
                </a>
            </div>
        </section>
        <section class="content-body my-2">
            <div class="row">

                <div class="col-md-3">
                    <form action="{{ route('admin.menu.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <ul class="list-group">
                            <li class="list-group-item mb-2">
                                <select name="position" class="form-control">
                                    <option value="mainmenu">Main Menu</option>
                                    <option value="footermenu">Footer Menu</option>
                                </select>
                            </li>
                            <li class="list-group-item mb-2 border">
                                <a class="d-block" href="#multiCollapseCategory" data-bs-toggle="collapse">
                                    Danh mục sản phẩm
                                </a>
                                <div class="collapse multi-collapse border-top mt-2" id="multiCollapseCategory">
                                    @foreach ($list_category as $category)
                                        <div class="form-check">
                                            <input name="categoryid[{{ $category->id }}]" class="form-check-input"
                                                type="checkbox" value="{{ $category->id }}"
                                                id="categoryid{{ $category->id }}" />
                                            <label class="form-check-label" for="categoryid">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                    <div class="my-3">
                                        <input name="createCategory" type="submit"
                                            class="btn btn-sm btn-success form-control" value="Thêm danh mục">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item mb-2 border">
                                <a class="d-block" href="#multiCollapsemenu" data-bs-toggle="collapse">
                                    Thương hiệu
                                </a>
                                <div class="collapse multi-collapse border-top mt-2" id="multiCollapsemenu">
                                    @foreach ($list_brand as $brand)
                                        <div class="form-check">
                                            <input name="brandid[{{ $brand->id }}]" class="form-check-input"
                                                type="checkbox" value="{{ $brand->id }}"
                                                id="brandid{{ $brand->id }}" />
                                            <label class="form-check-label" for="brandid">
                                                {{ $brand->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div class="my-3">
                                        <input name="createBrand" type="submit" class="btn btn-sm btn-success form-control"
                                            value="Thêm thuong hiệu">
                                    </div>
                            </li>
                            <li class="list-group-item mb-2 border">
                                <a class="d-block" href="#multiCollapseTopic" data-bs-toggle="collapse">
                                    Chủ đề bài viết
                                </a>
                                <div class="collapse multi-collapse border-top mt-2" id="multiCollapseTopic">
                                    @foreach ($list_topic as $topic)
                                        <div class="form-check">
                                            <input name="topicid[{{ $topic->id }}]" class="form-check-input"
                                                type="checkbox" value="{{ $topic->id }}"
                                                id="topicid{{ $topic->id }}" />
                                            <label class="form-check-label" for="topicid">
                                                {{ $topic->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div class="my-3">
                                        <input name="createTopic" type="submit" class="btn btn-sm btn-success form-control"
                                            value="Thêm chủ đề">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item mb-2 border">
                                <a class="d-block" href="#multiCollapsePage" data-bs-toggle="collapse">
                                    Trang đơn
                                </a>
                                <div class="collapse multi-collapse border-top mt-2" id="multiCollapsePage">
                                    @foreach ($list_post as $post)
                                        <div class="form-check">
                                            <input name="postid[{{ $post->id }}]" class="form-check-input"
                                                type="checkbox" value="{{ $post->id }}"
                                                id="postid{{ $post->id }}" />
                                            <label class="form-check-label" for="postid">
                                                {{ $post->title }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div class="my-3">
                                        <input name="createPost" type="submit" class="btn btn-sm btn-success form-control"
                                            value="Thêm bài viết">
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item mb-2 border">
                                <a class="d-block" href="#multiCollapseCustom" data-bs-toggle="collapse">
                                    Tùy biến liên kết
                                </a>
                                <div class="collapse multi-collapse border-top mt-2" id="multiCollapseCustom">
                                    <div class="mb-3">
                                        <label>Tên menu</label>
                                        <input type="text" name="name" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label>Liên kết</label>
                                        <input type="text" name="link" class="form-control" />
                                    </div>
                                    <div class="my-3">

                                        <input name="createCustom" type="submit"
                                            class="btn btn-sm btn-success form-control" value="Thêm">

                                    </div>
                                </div>
                            </li>
                            <div class="mb-3">
                                <label><strong>Sắp xếp</strong></label>
                                <select name="sort_order" class="form-select">
                                    <option value="0">None</option>
                                    {!! $html_sort_order !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label><strong>Cấp cha</strong></label>
                                <select name="parent_id" class="form-select">
                                    <option value="0">None</option>
                                    {!! $html_parent_id !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label><strong>Trạng thái</strong></label>
                                <select name="status" class="form-select">
                                    <option value="1">Xuất bản</option>
                                    <option value="2">Chưa xuất bản</option>
                                </select>
                            </div>

                        </ul>
                    </form>
                </div>
                <div class="col-md-9">
                    @includeIf('backend.message')
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:30px;">
                                    <input type="checkbox" id="checkboxAll" />
                                </th>
                                <th>Tên menu</th>
                                <th>Liên kết</th>
                                <th>Vị trí</th>
                                <th>Chuc nang</th>
                                <th class="text-center" style="width:30px;">ID</th>
                            </tr>
                        </thead>
                        @foreach ($menus as $menu)
                            <tbody>
                                <tr class="datarow">
                                    @php
                                        $args = ['id' => $menu->id];
                                    @endphp
                                    <td class="text-center">
                                        <input type="checkbox" value="{{ $menu->id }}" />
                                    </td>
                                    <td>
                                        <div class="name">
                                            <a href="index.php?opt=menu&cat=edit&id=<">
                                                {{ $menu->name }}
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $menu->link }}</td>
                                    <td>{{ $menu->position }}</td>

                                    <td>
                                        @if ($menu->status == 1)
                                            <a href="{{ route('admin.menu.status', $args) }}"
                                                class="btn btn-sm btn-success ">
                                                <i class="fa fa-toggle-on"></i> hiện
                                            </a>
                                        @else
                                            <a href="{{ route('admin.menu.status', $args) }}"
                                                class="btn btn-sm btn-danger ">
                                                <i class="fa fa-toggle-off"></i> ẩn
                                            </a>
                                        @endif

                                        <a href="{{ route('admin.menu.edit', $args) }}" class="btn btn-sm btn-primary ">
                                            <i class="fa fa-edit"></i> chỉnh sửa
                                        </a>
                                        <a href="{{ route('admin.menu.show', $args) }}" class="btn btn-sm btn-info ">
                                            <i class="fa fa-eye"></i> chi tiết
                                        </a>
                                        <a href="{{ route('admin.menu.delete', $args) }}" class="btn btn-sm btn-danger ">
                                            <i class="fa fa-trash"></i> xóa
                                        </a>
                                    </td>
                                    <td class="text-center">{{ $menu->id }}</td>
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
