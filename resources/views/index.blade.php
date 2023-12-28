<!-- resources/views/index.blade.php -->

@include('components.head')

<div class="add_todo">
    <form action="{{ route("store") }}" method="post">
        @csrf
        <label for="Tasks">Tasks
            @error('name')
                <input type="text" name="name" placeholder="Task Name" value="{{ old("name") }}">
                <span class="error">{{ $message }}</span>
            @else
                <input type="text" name="name" placeholder="Task Name">
            @enderror
        </label>
        <button type="submit">Add</button>
    </form>
</div>

@if(session('success'))
    <div class="success-message">{{ session('success') }}</div>
@endif

<div class="tasks">
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->name }}</li>
        @endforeach
    </ul>
</div>

@include('components.footer')
