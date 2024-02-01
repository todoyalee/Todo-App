@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h4>Edit Page  </h4>    
                <form>
  <div class="mb-3">
    <label  class="form-label">Title</label>
    <input type="text" class="form-control" name="title">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <input name="description" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
