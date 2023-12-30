<!-- resources/views/index.blade.php -->

@include('components.head')
<div class="center">
    <div class="container">
        
        <div class="add_todo">
            <form action="{{ route("store") }}" method="post">
                @csrf
                @method("POST")
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
                    <li>
                        @if ($task->completed == 0)
                            <a href="/edit/{{ $task->id }}">{{ $task->name }}</a>
                            <form action="{{ route('complete', ['id' => $task->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method("PUT")
                                <button type="submit">Done</button>
                            </form>
                            <form action="{{ route("delete", ['id' => $task->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Delete</button>
                            </form>
                        @else
                            <s>{{ $task->name }}</s>
                            <form action="{{ route("delete", ['id' => $task->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method("DELETE")
                                <button type="submit">Delete</button>
                            </form>           
                        @endif
                        
                        
                        <!-- Use a button or link to trigger the form submission -->
                        
                    </li>
                @endforeach
            </ul>
        </div>
    
    </div>
</div>
@include('components.footer')
