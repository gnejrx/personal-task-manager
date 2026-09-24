<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TaskFlow - Personal Task Manager</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<header class="navbar">
    <div class="brand">
        <div class="brand-icon">♡</div>

        <div>
            <h1>Task<span>Flow</span></h1>
            <p>Personal Task Manager</p>
        </div>
    </div>
</header>


<main class="container">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert-success" id="successMessage">
            <span>✓</span>
            {{ session('success') }}
        </div>
    @endif


    {{-- VALIDATION ERRORS --}}
    @if($errors->any())
        <div class="alert-error">
            <strong>Please fix the following:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- WELCOME --}}
    <section class="welcome">
        <h2>Good day! 👋</h2>
        <p>Here's what's happening with your tasks today.</p>
    </section>


    {{-- STATISTICS --}}
    <section class="stats">

        <div class="stat-card">
            <div class="stat-title">TOTAL TASKS</div>
            <div class="stat-number">{{ $totalTasks }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-title">PENDING</div>
            <div class="stat-number">{{ $pendingTasks }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-title">COMPLETED</div>
            <div class="stat-number">{{ $completedTasks }}</div>
        </div>

    </section>


    {{-- TASK SECTION --}}
    <section class="task-section">

        <div class="section-header">

            <div>
                <h2>My Tasks</h2>
                <p>{{ $totalTasks }} task(s)</p>
            </div>

            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                + Add Task
            </a>

        </div>


        {{-- TASK LIST --}}
        @forelse($tasks as $task)

            <div class="task-card">

                <div class="task-content">

                    <div class="task-top">

                        <div>
                            <h3>{{ $task->task_name }}</h3>

                            @if($task->description)
                                <p class="description">
                                    {{ $task->description }}
                                </p>
                            @endif

                            @if($task->due_date)
                                <p class="due-date">
                                    📅 Due:
                                    {{ $task->due_date->format('F d, Y') }}
                                </p>
                            @endif
                        </div>


                        {{-- STATUS --}}
                        @if($task->status === 'Completed')
                            <span class="status completed">
                                ✓ Completed
                            </span>
                        @else
                            <span class="status pending">
                                • Pending
                            </span>
                        @endif

                    </div>


                    <div class="task-actions">

                        {{-- EDIT --}}
                        <a
                            href="{{ route('tasks.edit', $task) }}"
                            class="btn btn-edit"
                        >
                            ✏ Edit
                        </a>


                        {{-- STATUS --}}
                        @if($task->status === 'Pending')

                            <form
                                action="{{ route('tasks.complete', $task) }}"
                                method="POST"
                            >
                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="btn btn-complete"
                                >
                                    ✓ Mark Completed
                                </button>
                            </form>

                        @else

                            <form
                                action="{{ route('tasks.pending', $task) }}"
                                method="POST"
                            >
                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="btn btn-pending"
                                >
                                    ↩ Mark Pending
                                </button>
                            </form>

                        @endif


                        {{-- DELETE --}}
                        <form
                            action="{{ route('tasks.destroy', $task) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this task?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-delete"
                            >
                                🗑 Delete
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="empty-state">
                <div class="empty-icon">♡</div>

                <h3>No tasks yet</h3>

                <p>
                    Add your first task and start organizing your day!
                </p>

                <a
                    href="{{ route('tasks.create') }}"
                    class="btn btn-primary"
                >
                    + Add Your First Task
                </a>
            </div>

        @endforelse

    </section>

</main>


<script>

    // Automatically hide success message after 3 seconds
    const successMessage = document.getElementById('successMessage');

    if (successMessage) {

        setTimeout(() => {

            successMessage.style.opacity = '0';
            successMessage.style.transform = 'translateY(-10px)';

            setTimeout(() => {
                successMessage.remove();
            }, 400);

        }, 3000);

    }

</script>

</body>
</html>