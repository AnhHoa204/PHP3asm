@extends('admin.layout.master')
@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        </div>
        

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
