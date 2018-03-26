@extends('layouts.default2')


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">CMS</li>
            <li class="breadcrumb-item"><a href="/cms/categories">Categories and subcategories</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit category</li>
        </ol>
    </nav>

    <div class="col-sm-8">
        <h2>Edit category: {!! $category->name !!}</h2>
        <hr>

        <form method="POST" action="/cms/categories/{{$category->id}}/edit" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="'form-control" id="name" name="name" value="{{$category->name}}" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

@endsection
