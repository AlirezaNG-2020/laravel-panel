<?php

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\CategoryRequest;
use App\Models\Content\Category;
use App\Services\UploadFileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $LANG = config('app.lang');
        $categories = Category::orderByDesc('id')->paginate(15);
        return view('admin.content.category.index', compact('LANG', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $parentCategories = Category::where('parent_id', null)->get();
        $parentCategories = Category::whereNull('parent_id')->get();
        return view('admin.content.category.create' , compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $inputes = $request->all();

        if( isset($request->slug) ) {
            $slugDB = Category::where($request->slug, 'slug')->get();
            if($slugDB) {
                $inputes['slug'] = slugify($request->slug . '-' . rand(1, 100));
            } else {
                $inputes['slug'] = slugify($request->slug);
            } 
        }

        else {
                $inputes['slug'] = slugify($request->name);
            }
            // $slugfiled = slugify($request->slug);
            // $inputes['slug'] = $slugfiled;
        
        

        if($request->hasFile('image')) {
            $imageUpload = new UploadFileService($request->image, public_path("images" . DS . "post-category"));
            $imageUpload->save();
            $inputes['image'] = $imageUpload->path;
            $postCategory = Category::create($inputes);
            return to_route('admin.content.category.index');
        }



        // $uploadedFile = new UploadFileService($request->image, public_path('images/category'));
        // $uploadedFile = save();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function changeStatus(Category $category)
    {
        $category->is_active = $category->is_active ? 0 : 1;
        $result = $category->save(); // true, false

        if($result) {

            if($category->is_active) {
                // return response()->json(['result'=> true]);
                return Response::json(['result'=> true, 'is_active' => true]);

            } else{
                return Response::json(['result'=> true, 'is_active' => false]);
            }


        } else {
                return Response::json(['result'=> false]);
        }
    }
}
