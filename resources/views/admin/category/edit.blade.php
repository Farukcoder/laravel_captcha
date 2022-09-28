@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Category') }}</div>

                <div class="card-body">
                <a href="{{route('category.index')}}">All category</a>
                    <br>

                    <form method="POST" action="{{route('category.update',$data->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="Category_name">Category Name</label>
                            <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" name = "category_name" value="{{$data->category_name}}"placeholder="Category name">

                            @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <br>
                        <button type="submit" class="btn btn-info">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
