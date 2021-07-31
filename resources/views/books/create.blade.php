@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 center mx-0">
            <div class="card">
             <div class="card-header">
              <div class="d-flex">
                  <h2>Create new book</h2>
                  <div class="ml-auto">
                      <a href="{{route('books.index')}}" class="btn btn-outline-secondary">Back to all books</a>
                  </div>
              </div>
          </div>
                <div class="card-body col-sm-5">
                    <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('books._form', ['formType'=>"create"])
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection