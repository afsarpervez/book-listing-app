@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 center mx-0">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h2>{{$book->title}}</h2>
                        <div class="ml-auto">
                            <a href="{{route('books.index')}}" class="btn btn-outline-secondary">Back to all books</a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <div class="card-text">
                        @include('layouts._messeges')
                        <p>{{$book->body}}</p>
                        <p><a href="{{route('files.view', [$book->id, $book->slug])}}" class="btn btn-outline-success">Download</a></p>

                        <hr>
                        <div class="d-flex justify-content-between">
                         <i>by: {{$book->author}}</i>
                         <i >Edition: {{$book->edition}}</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection