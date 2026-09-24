<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Task - TaskFlow</title>

    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}"
    >

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


<main class="form-container">

    <div class="form-card">

        <div class="form-heading">

            <span class="form-icon">✏</span>

            <div>

                <h2>Edit Task</h2>

                <p>Update your task information.</p>

            </div>

        </div>


        @if($errors->any())

            <div class="alert-error">

                <ul>

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('tasks.update', $task) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="form-group">

                <label for="task_name">
                    Task Name
                </label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ old('task_name', $task->task_name) }}"
                    required
                >

            </div>


            <div class="form-group">

                <label for="description">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                >{{ old('description', $task->description) }}</textarea>

            </div>


            <div class="form-row">

                <div class="form-group">

                    <label for="status">
                        Status
                    </label>

                    <select
                        id="status"
                        name="status"
                    >

                        <option
                            value="Pending"
                            {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="Completed"
                            {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}
                        >
                            Completed
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label for="due_date">
                        Due Date
                    </label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        value="{{ old('due_date', $task->due_date?->format('Y-m-d')) }}"
                    >

                </div>

            </div>


            <div class="form-buttons">

                <a
                    href="{{ route('tasks.index') }}"
                    class="btn btn-cancel"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    ✓ Update Task
                </button>

            </div>

        </form>

    </div>

</main>

</body>
</html>