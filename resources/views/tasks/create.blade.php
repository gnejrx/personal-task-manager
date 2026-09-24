<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Task - TaskFlow</title>

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

            <span class="form-icon">+</span>

            <div>

                <h2>Add New Task</h2>

                <p>Create a task to keep yourself organized.</p>

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
            action="{{ route('tasks.store') }}"
            method="POST"
        >

            @csrf


            <div class="form-group">

                <label for="task_name">
                    Task Name
                </label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ old('task_name') }}"
                    placeholder="e.g. Study Laravel"
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
                    placeholder="Add some details about this task..."
                >{{ old('description') }}</textarea>

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

                        <option value="Pending">
                            Pending
                        </option>

                        <option value="Completed">
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
                        value="{{ old('due_date') }}"
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
                    ✓ Save Task
                </button>

            </div>

        </form>

    </div>

</main>

</body>
</html>