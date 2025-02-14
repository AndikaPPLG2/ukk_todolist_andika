{{-- @extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>
    <form action="{{ route('task.update', $data->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Task Name:</label>
        <input type="text" name="name" id="name" value="{{ $data->name }}" required>
        <button type="submit">Update</button>
    </form>
@endsection --}}
