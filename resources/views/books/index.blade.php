@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 center mx-0">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h2>All Books</h2>
                        <div class="ml-auto">
                            <a href="{{route('books.create')}}" class="btn btn-outline-secondary">Create new book</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        @include('layouts._messeges')
                        @foreach ($books as $book)
                            <h3><a href="{{route('books.show', [$book->id, $book->slug])}}">{{$book->title}}</a></h3>
                            <div class="d-flex align-items-center">
                                @can('update', $book)
                                    <a class="btn btn-sm btn-outline-success" href="{{route('books.edit', $book->id)}}">Edit</a> 
                                @endcan

                                @can('delete', $book)
                                    <form class="ml-1" action="{{route('books.destroy', $book->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                @endcan
                            </div>

                            
                            <p><i>by {{$book->user->name}}</i> {{$book->created_at}} <br><strong>Category: </strong> {{$book->category->title}}</p>
                            
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--- Pagination Component Here --->
{{$books->links()}}
    
</div>

@endsection