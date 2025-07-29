@extends('admin.layouts.base')


@section('title', 'ایجاد یک دسته بندی جدید')


@section('head-tag')
    <link rel="stylesheet" href="{{ asset('select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
    <x-my.content-header>
            <x-slot:title> 
                ایجاد دسته بندی جدید
            </x-slot:title>

             <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">خانه</a></li>
             <li class="breadcrumb-item">محتوا</li>
             <li class="breadcrumb-item active">ایجاد دسته بندی</li>
        </x-my.content-header>


        <section class="content">
            <section class="container-fluid">
                <section class="col-md-12">
                    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">مثال ساده</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('admin.content.category.store') }}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                  <section class="col-md-6">
                    <div>
                      <label for="name">نام دسته</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="ایمیل را وارد کنید">
                    </div>
                    @error('name')
                      <strong class="error text-danger mt-1" role="alert" aria-modal="">{{ $message }}</strong> 
                    @enderror
                  </section>


                  <section class="col-md-6">
                    <div>
                      <label for="">وضعیت دسته بندی</label>
                      <select name="is_active" id="" class="form-control">
                        <option selected disabled label="" hidden> وضعیت دسته بندی را انتخاب کنید</option>
                        <option value="1">فعال</option>
                        <option value="0">غیرفعال</option>
                      </select>
                    </div>
                  </section>

                  <section class="col-md-6">
                    <div>
                      <label for="exampleInputFile">ارسال فایل</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">انتخاب تصویر</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">آپلود</span>
                        </div>
                      </div>
                    </div>
                </section>

                  <section class="col-md-6">
                    <div>
                      <label for="">دسته بندی والد</label>
                      <select name="parent_id" id="" class="form-control">
                        <option selected disabled label hidden> دسته بندی والد را انتخاب کنید</option>
                        @forelse ($parentCategories as $parentcategory)
                             <option value="{{ $parentcategory->id }}">{{ $parentcategory->name }}</option>
                        @empty
                              <option selected disabled label hidden>!فعلا دسته بندی ساخته نشده</option>
                        @endforelse
                       
                      </select>
                    </div>
                  </section>


                  <section class="col-md-6">
                    <div>
                      <label for="">برچسب های دسته</label>
                      <input type="hidden" name="tags" id="input-tags">
                      <select name="" id="tags-select2" class="form-control select2" multiple="multiple">
                        <option>تگ</option>
                        <option>گزینه 2</option>
                      </select>
                    </div>
                  </section>


                  <section class="col-md-6">
                    <div>
                      <label for="slug">نام اسلاگ</label>
                      <input type="text" class="form-control" id="slug" name="slug" placeholder="نام اسلاگ دسته بندی را وارد کنید">
                    </div>
                  </section>
                  
                  <section class="col-12">
                      <div>
                        <label for="">توضیحات</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="وارد کردن توضیحات ..."></textarea>
                      </div>
                   </section>
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
              </form>
            </div>
                </section>
            </section>
        </section>
@endsection



@section('script')
    <script src="{{ asset('select2/dist/js/select2.full.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('admin-assets/custom/js/tags.js') }}"></script>
@endsection