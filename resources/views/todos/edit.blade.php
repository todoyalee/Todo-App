@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h4>Edit Page  </h4>    
                <form method="post" action="{{ route('update') }}">
                  @csrf
                  @method('PUT')
                  <!--bedcause we're updating and not storing anything-->

                <input type="hidden" name="todo_id" value="{{$todo->id}}">
  <div class="mb-3">
    <label  class="form-label">Title</label>
    <input type="text" class="form-control" name="title" value="{{ $todo->title}}">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <input name="description" class="form-control" value="{{$todo->description}}">
  </div>

  <div class="mb-3">
<label for="">status</label>
<select name="is_completed" class="form-control">
<option disabled selected>Select option </option>
<option value="1">Completed</option>
<option value="0">In Completed</option>

</select>

</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
