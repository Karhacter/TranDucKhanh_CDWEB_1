 @extends('layouts.admin')
 @section('title', 'Quản lý sản phẩm')
 @section('content')
     <div class="content" style="padding-left: 20px;padding-right: 20px;">
         <section class="content-body my-2">
             <div class="row mb-5" style="padding-left: 20px;padding-right: 20px;border: 1px solid #0080ff">
                 <div class="col-md-9">
                     <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                         @csrf
                         <h2 class="text-main text-success">Thêm sản phẩm</h2>
                         <div class="mb-3">
                             <label>
                                 <strong>Tên sản phẩm(*)</strong>
                             </label>
                             <input type="text" name="name" id="name" placeholder="Nhập tên danh mục"
                                 value="{{ old('name') }}" class="form-control">
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
                             <label><strong>Mô tả</strong></label>
                             <textarea name="detail" rows="4" class="form-control" placeholder="Mô tả">{{ old('detail') }}</textarea>
                             @error('detail')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                         </div>
                         <div class="mb-3">
                             <label><strong>Tên danh mục</strong></label>
                             <select name="category_id" class="form-select">
                                 <option value="0">Chọn danh mục</option>
                                 {!! $html_category_id !!}
                             </select>
                         </div>
                         <div class="mb-3">
                             <label><strong>Tên thương hiệu</strong></label>
                             <select name="brand_id" class="form-select">
                                 <option value="0">Chọn thương hiệu</option>
                                 {!! $html_brand_id !!}
                             </select>
                         </div>
                 </div>
                 <div class="col-md-3">
                     <div class="box-container mt-2 bg-white">
                         <div class="box-header py-1 px-2 border-bottom">
                             <strong>Giá và số lượng</strong>
                         </div>
                         <div class="box-body p-2 border-bottom">
                             <div class="mb-3">
                                 <label><strong>Giá bán (*)</strong></label>
                                 <input type="number" value="10000" min="100" name="price" class="form-control" />
                             </div>
                             <div class="mb-3">
                                 <label><strong>Giá khuyến mãi (*)</strong></label>
                                 <input type="number" value="10000" min="0" name="pricesale"
                                     class="form-control" />
                             </div>
                             <div class="mb-3">
                                 <label><strong>Số lượng (*)</strong></label>
                                 <input type="number" value="1" min="1" name="qty" class="form-control" />
                             </div>
                         </div>
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
             </div>

             <div class="table-responsive" style="padding-left: 20px;padding-right: 20px;border: 1px solid #0080ff">
                 <h1 class="d-inline text-main text-success ">Sản phẩm</h1>
                 <div class="text-end mb-4">
                     <a href="{{ route('admin.product.trash') }}" class="btn btn-sm btn-danger">
                         <i class="fa fa-trash"></i> Thùng rác
                     </a>
                 </div>
                 @includeIf('backend.message')

                 <table class="table table-bordered">
                     <thead>
                         <tr>
                             <th class="text-center" style="width:30px;">
                                 <input type="checkbox" id="checkboxAll" />
                             </th>
                             <th class="text-center" style="width:130px;">Hình ảnh</th>
                             <th>Tên sản phẩm</th>
                             <th>Tên danh mục</th>
                             <th>Tên thương hiệu</th>
                             <th>Chuc nang</th>
                             <th>ID</th>
                         </tr>
                     </thead>
                     @foreach ($products as $product)
                         <tbody>
                             <tr class="datarow">
                                 @php
                                     $args = ['id' => $product->id];
                                 @endphp
                                 <td>
                                     <input type="checkbox" id="checkId[]" value="{{ $product->id }}" />
                                 </td>
                                 <td>
                                     <img class="img-fluid" src="{{ asset('images/products/' . $product->image) }}"
                                         alt="Image">
                                 </td>
                                 <td>
                                     <div class="name">
                                         <a href="index.php?opt=product&cat=edit">
                                             {{ $product->name }}
                                         </a>
                                     </div>

                                 </td>
                                 <td> {{ $product->category->name ?? 'Unknown' }} </td>
                                 <td> {{ $product->brand->name ?? 'Unknown' }}</td>
                                 <td>
                                     <div class="function_style">

                                         @if ($product->status == 1)
                                             <a href="{{ route('admin.product.status', $args) }}"
                                                 class="btn btn-sm btn-success ">
                                                 <i class="fa fa-toggle-on"></i> hiện
                                             </a>
                                         @else
                                             <a href="{{ route('admin.product.status', $args) }}"
                                                 class="btn btn-sm btn-danger ">
                                                 <i class="fa fa-toggle-off"></i> ẩn
                                             </a>
                                         @endif

                                         <a href="{{ route('admin.product.edit', $args) }}"
                                             class="btn btn-sm btn-primary ">
                                             <i class="fa fa-edit"></i> chỉnh sửa
                                         </a>
                                         <a href="{{ route('admin.product.show', $args) }}" class="btn btn-sm btn-info ">
                                             <i class="fa fa-eye"></i> chi tiết
                                         </a>
                                         <a href="{{ route('admin.product.delete', $args) }}"
                                             class="btn btn-sm btn-danger ">
                                             <i class="fa fa-trash"></i> xóa
                                         </a>
                                     </div>
                                 </td>
                                 <td class="text-center" style="width:30px;">{{ $product->id }}</td>
                             </tr>

                         </tbody>
                     @endforeach

                 </table>
             </div>
         </section>
     </div>
 @endsection
