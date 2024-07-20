@extends('admin.layouts.master')
@section('title')
edit categories
@endsection

@section('content')
<form action="{{route('admin.categories.update', $category)}}" method="POST" enctype="multipart/form-data" class="form-control">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Tên</label>
        <input type="text" name="name" value="{{$category->name}}">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Ảnh</label>
        <input type="file" name="cover" >
        <div style="width: 100px; height: 100px;">
            <img src="{{Storage::url($category->cover)}}" alt="" width="100" height="100">
            </div>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Trang thái</label>
        <input type="checkbox" class="form-check-input" name="is_active" checked($category->is_active)>
    </div>
    <button type="submit" class="btn btn-success"> Create</button>
</form>
@endsection
