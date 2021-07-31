@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 center mx-0">
            <div class="card">
             <div class="card-header">
              <div class="d-flex">
                  <h2>Create new category</h2>
                  <div class="ml-auto">
                      <a href="{{route('category.index')}}" class="btn btn-outline-secondary">Back to all categories</a>
                  </div>
              </div>
          </div>
                <div class="card-body col-sm-5">
                    <form action="{{route('category.update', $category->id)}}" method="POST">
						{{method_field('PUT')}}
                        @csrf
                        @include('category._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection