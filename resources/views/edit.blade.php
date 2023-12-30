@include('components.head')
<div>
    <h1>Edit {{$task->name}}</h1>
    <form action="{{ route("update", ['id' => $task->id]) }}" method="post">
        @csrf
        @method("PUT")
        <label for="edit task">Edit
            @error('name')
                    <input type="text" name="name" placeholder="Task Name" value="{{ $task->name || old("name") }}">
                    <span class="error">{{ $message }}</span>
                @else
                    <input type="text" name="name" placeholder="Task Name" value="{{ $task->name }}">
                @enderror
        </label>
        <button type="submit">Edit</button>
    </form>
</div>
@include('components.footer')