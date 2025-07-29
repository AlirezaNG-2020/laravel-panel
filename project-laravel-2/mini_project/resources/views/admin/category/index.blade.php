@extends('admin.layouts.app');

@section('title', 'دسته بندی');

@section('category', 'active');

@section('content');

<section class="container container-table">
    <section class="card">
        <section class="card-header p-3 header-table d-flex justify-content-between align-items-center">
            <div>
                <h3>لیست دسته بندی ها</h3>
            </div>

            <div>
                <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-primary">ایجاد دسته بندی</a>
            </div>
        </section>
        <section class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">نام دسته</th>
                    <th scope="col">توضیحات</th>
                    <th scope="col">نام پست</th>
                    <th scope="col">وضعیت</th>
                    <th scope="col">تاریخ ساخت</th>
                    <th scope="col" class="text-center">تنظیمات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->post->title }}</td>
                        <td>{{ ($category->status == 1) ? 'فعال' : 'غیرفعال' }}</td>
                        <td>{{ jalaliDate($category->created_at, 'H:i:s Y-m-d') }}</td>
                        <td class="text-start">
                            <a href="{{ route('admin.category.edit', $category->id ) }}" class="btn btn-outline-success btn-sm"><i class="bi bi-pencil-square fs-6"></i>ویرایش</a>
                            
                            <form action="{{route('admin.category.destroy', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete');
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash fs-6"></i>حذف</button>
                            </form>


                            <form action="{{ route('admin.category.status', $category->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary btn-sm"><i class="bi bi-toggles2 fs-6"></i>تغییر وضعیت</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $categories -> links() }}

        </section>
    </section>
</section>

@endsection;




