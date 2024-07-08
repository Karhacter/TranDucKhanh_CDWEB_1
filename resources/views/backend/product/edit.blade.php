 @extends('layouts.admin')
 @section('title', 'Cập nhật sản phẩm')
 @section('content')
     <div class="content" style="padding-left: 20px;padding-right: 20px;">
         <section class="content-body my-2">

             <div class="row mb-5" style="padding-left: 20px;padding-right: 20px;">
                 <div class="text-end mb-4">
                     <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-success">
                         <i class="fa fa-arrow-left"></i> Về danh sách
                     </a>
                 </div>
                 <div class="col-md-9">
                     <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="post"
                         enctype="multipart/form-data">
                         @csrf
                         @method('put')
                         <h2 class="text-main text-success">Cập nhật sản phẩm</h2>

                         <div class="mb-3">
                             <label>
                                 <strong>Tên sản phẩm(*)</strong>
                             </label>
                             <input type="text" name="name" id="name" placeholder="Nhập tên danh mục"
                                 value="{{ old('name', $product->name) }}" class="form-control">
                             @error('name')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                         </div>
                         <div class=" mb-3">
                             <label>
                                 <strong>Tên slug (*)</strong>
                             </label>
                             <input type="text" name="slug" placeholder="Nhập tên slug"
                                 value="{{ old('slug', $product->slug) }}" class="form-control">
                             @error('slug')
                                 <span class="text-danger">{{ $message }}</span>
                             @enderror
                         </div>
                         <div class="mb-3">
                             <label><strong>Mô tả</strong></label>
                             <textarea name="detail" rows="4" class="form-control" placeholder="Mô tả">{{ old('detail', $product->detail) }}</textarea>
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
                                 <input type="number" value="10000" min="10000" name="price" class="form-control" />
                             </div>
                             <div class="mb-3">
                                 <label><strong>Giá khuyến mãi (*)</strong></label>
                                 <input type="number" value="10000" min="10000" name="pricesale"
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
                             <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                             <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                         </select>
                     </div>
                     <div class="mb-3 text-end">
                         <button type="submit" class="btn btn-sm btn-success" name="THEM">
                             <i class="fa fa-save"></i> Lưu[Cập nhật]
                         </button>
                     </div>
                     </form>
                 </div>
             </div>
         </section>
     </div>
 @endsection
