@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 center mx-0">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h2>All categories</h2>
                        <div class="ml-auto">
                            <a href="{{route('category.create')}}" class="btn btn-outline-secondary">Create new category</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        @include('layouts._messeges')
                        @foreach ($categories as $category)
                            <h3><a href="{{route('category.show', $category->id)}}">{{$category->title}}</a></h3>
                            <div class="d-flex align-items-center">
                                @can('update', $category)
                                    <a class="btn btn-sm btn-outline-info" href="{{route('category.edit', $category->id)}}">Edit</a> 
                                @endcan

                                @can('delete', $category)
                                    <form class="ml-1" action="{{route('category.destroy', $category->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-info" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                @endcan
                            </div>

                            <p>total books: {{$category->books_count}}</p>
                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection