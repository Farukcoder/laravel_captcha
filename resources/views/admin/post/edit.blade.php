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

                    <form method="POST" action="{{route('sub_category.update',$data->id) }}">
                        @csrf

                        <div class="form-group">
                            <label for="Category_name">Choose Category</label>
                            <select class="form-control" name="category_id" id="">
                                @foreach ($categoris as $value)
                                        <option value="{{$value->id}}" @if ($value->id == $data->category_id) selected @endif>{{$value->category_name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Sub Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name = "name" value="{{$data->name}}"placeholder="Sub Category name">

                            @error('name')
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
