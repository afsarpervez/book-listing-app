@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 center mx-0">
            <div class="card">
             <div class="card-header">
              <div class="d-flex">
                  <h2>Edit this book entry</h2>
                  <div class="ml-auto">
                      <a href="{{route('books.index')}}" class="btn btn-outline-secondary">Back to all books</a>
                  </div>
              </div>
          </div>
                <div class="card-body col-sm-5">
                    <form action="{{route('books.update', $book->id)}}" method="POST" enctype="multipart/form-data">
                     {{method_field('PUT')}}
                        @csrf
                        @include('books._form', ['formType'=>"edit"])
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection