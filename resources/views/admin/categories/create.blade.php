@extends('admin.layouts.master')
@section('title')
    create categories
@endsection

@section('content')
<form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
                <label for="" class="form-label">Tên</label>
                <input type="text" name="name">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Ảnh</label>
                <input type="file" name="cover">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Trang thái</label>
                <input type="checkbox" class="form-check-input" name="is_active" checked>
            </div>
            <button type="submit" class="btn btn-success"> Create</button>
    </form>
@endsection
