@extends('admin.layouts.master')
@section('title')
Danh sách sản phẩm
@endsection

@section('content')
<a href="{{route('admin.categories.create')}}">Create</a>
@if(session('message'))
<h4>{{session('message')}}</h4>
@endif
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Ảnh</th>
            <th>Trang thái</th>
            <th>Hành Đông</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>
                <div style="width: 100px; height: 100px;">
                    <img src="{{Storage::url($item->cover)}}" alt="" width="100" height="100">
                </div>
            </td>
            <td>
                {!! $item->is_active ? '<span class="badge bg-success"> Green</span>'
                    :
                    '<span class="badge bg-danger"> red</span>'
                !!}
            </td>
            <td>
                <a href="{{route('admin.categories.show', $item)}}">
                    <button>VIEW</button>
                </a>
                <a href="{{route('admin.categories.edit', $item)}}">
                    <button>EDIT</button>
                </a>
                <form action="{{route('admin.categories.destroy', $item)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick=" return confirm('You want to delete')"> Xoa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$data->links()}}
@endsection
