@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multipart/form-data" method="POST">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <div class="row">
                        <h1>Add New Post</h1>
                    </div>
                    <label for="title" class="col-md-4 col-form-label">Post Title</label>
                    
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" 
                        name="title" value="{{ old('title') }}" 
                        autocomplete="title" 
                        autofocus> 

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>
                        
                        <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" 
                            name="caption" value="{{ old('caption') }}" 
                            autocomplete="caption" 
                            autofocus>

                        @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                </div>
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>
                    <input type="file" class="form-control file" id="image" name="image"/>
                    @error('image')
                        <strong>{{ $message }}</strong>   
                    @enderror
                </div>
                <div class="row pt-4">
                    <button class="btn btn-primary">Add new post</button>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection
