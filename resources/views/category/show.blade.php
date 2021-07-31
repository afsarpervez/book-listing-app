@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 center mx-0">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h2>{{$category->title}}</h2>
                        <div class="ml-auto">
                            <a href="{{route('category.index')}}" class="btn btn-outline-secondary">Back to all category</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        @include('layouts._messeges')
                            <category-details :category="{{$category}}"></category-details>
                            <hr>

                            @foreach ($category->books as $book)
                                <div class="d-flex">
                                    <h4><a href="{{route('books.show', [$book->id, $book->slug])}}">{{$book->title}}</a></h4>
                                    <i class="ml-5">by: {{$book->author}}</i>
                                    <i class="ml-5">Edition: {{$book->edition}}</i>
                                </div>
                            @endforeach
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection