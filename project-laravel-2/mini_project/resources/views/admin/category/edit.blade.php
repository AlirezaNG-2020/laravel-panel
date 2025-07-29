@extends('admin.layouts.app');

@section('title', 'ویرایش دسته بندی');

@section('category', 'active');

@section('content');

<section class="container container-table">
    <section class="card">
        <section class="card-header p-3 header-table d-flex justify-content-between align-items-center">
            <div>
                <h3>ویرایش دسته بندی</h3>
            </div>

            <div>
                <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-primary">دکمه بازگشت</a>
            </div>
        </section>
        <section class="card-body p-5">
            <form action="{{route('admin.category.update' , $category->id)}}" method="POST">
                @csrf
                @method('put');
                <section class="row">
                    <section class="col-md-6">
                        <section class="form-group">
                            <label for="name" class="form-label">نام دسته بندی</label>
                            <input value="{{ $category->name }}" id="name" name="name" class="@error('name') is-invalid @enderror form-control form-control-sm" type="text" placeholder="نام دسته">
                        </section>

                         @error('name')
                            <span class="text-danger error">
                                {{-- فیلد نام دسته اجباری هست. --}}
                                {{ $message }}
                            </span>                        
                         @enderror
                    </section>
                   

                     <section class="col-md-6">
                        <section class="form-group">
                            <label for="cat_id" class="form-label">پست ها</label>
                            <select class="@error('cat_id') is-invalid @enderror form-select form-select-sm" id="cat_id" name="cat_id">
                            <option selected>پست مورد نظر را انتخاب کنید</option>
                                @foreach ($posts as $post)
                                    <option value="{{ $post->id }}" {{ $post->id === $category->cat_id ? 'selected' : '' }}>{{ $post->title }}</option>
                                @endforeach
                            </select>
                        </section>
                        @error('cat_id')
                            <span class="text-danger error">
                                {{ $message }}
                            </span>                        
                         @enderror
                    </section>


                    <section class="col-md-12 mt-3">
                        <section class="form-group">
                            <label for="status" class="form-label">وضعیت</label>
                            <select class="@error('status') is-invalid @enderror form-select form-select-sm" id="status" name="status">
                            <option selected>وضعیت پست دسته بندی را انتخاب کنید</option>
                            <option value="1" @if ($category->status == 1) selected @endif>فعال</option>
                            <option value="0" @if ($category->status == 0) selected @endif>غیر فعال</option>
                            </select>
                        </section>

                        @error('status')
                            <span class="text-danger error">
                                {{ $message }}
                            </span>                        
                         @enderror
                    </section>


                     <section class="col-md-12 mt-3">
                        <section class="form-group">
                            <label for="desc" class="form-label">توضیحات</label>
                            <textarea name="description" id="desc" rows="5" class="@error('description') is-invalid @enderror form-control form-control-sm">{{ $category->description }}</textarea>
                        </section>
                         @error('description')
                            <span class="text-danger error">
                                {{ $message }}
                            </span>                        
                         @enderror
                    </section>


                    <section class="col-md-12 mt-3">
                        <section class="form-group">
                          <button type="submit" class="btn btn-sm btn-success">ثبت</button>
                        </section>
                    </section>
                </section>
            </form>
        </section>
    </section>
</section>

@endsection;