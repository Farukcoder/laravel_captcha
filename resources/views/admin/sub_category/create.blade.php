@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add sub Category') }}</div>

                <div class="card-body">
                {{-- <a href="{{route('category.index')}}">All category</a>
                    <br> --}}
                    <form method="POST" action="{{route('sub_category.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="Category_name">Choose Category</label>
                            <select class="form-control" name="category_id" id="">
                                @foreach ($category as $value)
                                        <option value="{{$value->id}}">{{$value->category_name}}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Sub Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name = "name" value="{{ old('name') }}"placeholder="Sub Category name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function(){
        console.log('hellow world');
    });
</script>
@endpush
