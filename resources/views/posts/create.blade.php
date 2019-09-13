@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <h1>Add New Ass</h1>
    </div>  
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label ">Post Caption</label>
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" 
                    name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <label for="image" class="col-md-4 col-form-label ">Post Image</label>
                <input type="file" class="form-control-file" required id="image" name="image">

                @error('image')
                        <strong>{{ $message }}</strong>
                @enderror
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-8 offset-2">
                <button type="submit" class="btn btn-lg btn-success">Add new Ass</button>
            </div>
        </div>
    </form>
</div>
@endsection