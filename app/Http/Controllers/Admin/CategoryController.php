<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    const PATH_VIEW = 'admin.categories.';
    const PATH_UPLOAD = 'categories';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Category::query()->latest('id')->paginate(5);

        return view(self::PATH_VIEW . __FUNCTION__,compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // dd($request);
        //
        $data = $request->except('cover');
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($request->hasFile('cover')){
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));

        }else{
            $data['cover'] = '';
        }
        Category::query()->create($data);
        return redirect()->route('admin.categories.index')->with('message','Add new complete');

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //s
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        $data = $request->except('cover');
        $data['is_active'] = isset($data['is_active']) ? 1 : 0;
        if($request->hasFile('cover')){
            $data['cover'] = Storage::put(self::PATH_UPLOAD, $request->file('cover'));
            if(!empty($category->cover) && Storage::exists('$category->cover')){
                Storage::delete($category->cover);
            }
        }else{
            // Keep again the picture
            $data['cover'] = $category->cover;
        }
        // dd($data);
        $category->update($data);
        // Category::query()->create($data);
        return redirect()->route('admin.categories.index')->with('message','Edit new complete');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        $category->delete();
        return back()->with('message', 'delete ok');
    }
}
