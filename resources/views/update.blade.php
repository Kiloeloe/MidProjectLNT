@extends('layout.master')
@section('title','index')
@section('content')

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{route('update',$book->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="mb-3">
      <label for="Title_book" class="form-label">Title</label>
      <input type="text" class="form-control" name="Title_book" value="{{$book->Title}}">
    </div>
    <div class="mb-3">
        <label for="Author_book" class="form-label">Author</label>
        <input type="text" class="form-control" name="Author_book" value="{{$book->Author}}">
      </div>
      <div class="mb-3">
        <label for="Publisher_book" class="form-label">Page</label>
        <input type="text" class="form-control" name="Page_book" value="{{$book->Page}}">
      </div>
      <div class="mb-3">
        <label for="Year_book" class="form-label">Year</label>
        <input type="text" class="form-control" name="Year_book" value="{{$book->Year}}">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
