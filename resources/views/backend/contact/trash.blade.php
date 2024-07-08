@extends('layouts.admin')
@section('title', 'Quản lý Liên hệ')
@section('content')
    <!--CONTENT  -->
    <div class="content" style="padding-left: 20px;padding-right: 20px;">
        <section class="content-header my-2">
            <h1 class="d-inline text-success">Liên hệ</h1>
            <a href="{{ route('admin.contact.index') }}" class="d-flex justify-content-end"><button
                    class="btn btn-sm btn-success">Về danh sách</button></a>
        </section>
        <section class="content-body my-2">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30px;">
                            <input type="checkbox" id="checkboxAll" />
                        </th>
                        <th>Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Tiêu đề</th>
                        <th>Chuc nang</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                @includeIf('backend.message')
                @foreach ($contacts as $contact)
                    <tbody>
                        <tr class="datarow">
                            @php
                                $args = ['id' => $contact->id];
                            @endphp
                            <td class="text-center">
                                <input type="checkbox" id="checkId" value="{{ $contact->id }}" />
                            </td>
                            <td>
                                <div class="name">
                                    <a href="index.php?opt=contact&cat=replay">
                                        {{ $contact->name }}
                                    </a>
                                </div>
                            </td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->content }}</td>
                            <td>


                                <a href="{{ route('admin.contact.show', $args) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i> Chi tiết
                                </a>
                                <a href="{{ route('admin.contact.restore', $args) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-undo"></i> Khôi phục
                                </a>
                                <form action="{{ route('admin.contact.destroy', $args) }}" method="post" class=" d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger ">
                                        <i class="fa fa-trash"></i> Xóa Hoàn toàn
                                    </button>
                                </form>

                            </td>
                            <td class="text-center">{{ $contact->id }}</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </section>
    </div>
    <!--END CONTENT-->
@endsection
