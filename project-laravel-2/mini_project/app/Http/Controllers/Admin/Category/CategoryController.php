<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(jalaliDate('today'));
        $categories = Category::orderBy('created_at', 'desc')->paginate(15);
        // dd($categories);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();
        return view('admin.category.create', compact('posts'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        // dd('hi');

        $inputs = $request->all();

        // روش اول:
        // $result = Category::create([
        //     'name' => $inputs['name'],
        //     'cat_id' => $inputs['cat_id'],
        //     'status' => $inputs['status'],
        //     'description' => $inputs['description'],
        // ]);


        // روش دوم:
        // $result = Category::create([
        //     'name' => $request->name,
        //     'cat_id' => $request->cat_id,
        //     'status' => $request->status,
        //     'description' => $request->description,
        // ]);


        // روش سوم:
        $result = Category::create($inputs);

        return redirect()->route('admin.category.index')->with('alert-success', 'دسته بندی با موفقیت ثبت شد');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $posts = Post::all();
        return view('admin.category.edit', compact('category', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $inputs = $request->all();
        $result = $category->update($inputs);

        return redirect()->route('admin.category.index')->with('alert-success', 'دسته بندی با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $result = $category->delete();
        return redirect()->route('admin.category.index')->with('alert-success', 'دسته بندی با موفقیت حذف شد');
    }

    public function status(Category $category)
    {
        // dd($category);
        $category->status = $category->status == 1 ? 0 : 1;
        $result = $category->save();
        return redirect()->route('admin.category.index')->with('alert-success', 'تغییر وضعیت با موفقیت انجام شد.');
    }
}
