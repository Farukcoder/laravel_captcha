@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{'post.store'}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Post Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Post Title" required>
                  </div>
                  <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" class="form-control" id="subcategory_id">
                        <option disabled selected>Choose Category</option>
                        @foreach($category as $value)
                            @php
                              $subcategoris = DB::table('subcategoris')->where('category_id',$value->id)->get();
                            @endphp
                            <option value="" disabled class="text-info">{{$value->category_name}}</option>

                            @foreach ($subcategoris as $subctg)
                              <option value="{{$subctg->id}}">--{{$subctg->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="subcategory ">Sub Category</label>
                    <select name="subcategory_id" class="form-control" id="subcategory_id">
                        <option value="">Example 1</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="subcategory ">Post Date</label>
                     <input type="date" class="form-control" name="post_date" id="post_date" placeholder="Post Title">
                  </div>
                  <div class="form-group">
                    <label for="subcategory ">Tags</label>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="tags">
                  </div>
                  <div class="form-group">
                    <label for="subcategory ">Description</label>
                    <textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image",id="image" class="custom-file-input" id="exampleInputFile" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Published Now</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(document).ready(function() {
            console.log('hellow world');
        });
    </script>
@endpush
