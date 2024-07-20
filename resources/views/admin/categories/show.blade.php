@extends('admin.layouts.master')
@section('title')
    view categories
@endsection

@section('content')
    <ul>
        <li>ID: {{$category->id}}</li>
        <li>Name: {{$category->name}}</li>
        <li>Pictures
            <div style="width: 100px; height: 100px;">
            <img src="{{Storage::url($category->cover)}}" alt="" width="100" height="100">
            </div>

        </li>
        <li>Active: {{$category->is_active}}</li>
    </ul>
@endsection
