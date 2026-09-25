# Personal Task Manager

## Project Information

**Project Code:** WST21-PM-2026-SF  
**Student Name:** REJOLIO, TRIXIE JENG R.  
**Course & Year:** BSIT - 2nd Year  
**Database Used:** SQLite  

## Project Description

Personal Task Manager is a simple Laravel-based web application that allows users to manage their personal tasks. Users can create, view, edit, delete, and update the status of their tasks.

## Features

- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status
  - Pending
  - Completed

## Technologies Used

- Laravel
- PHP
- Blade
- SQLite
- HTML
- CSS

## Database

The system uses an SQLite database with a `tasks` table containing:

| Field | Purpose |
|---|---|
| id | Task ID |
| task_name | Name of the task |
| description | Task details |
| status | Pending or Completed |
| due_date | Task deadline |
| created_at | Date the task was created |
| updated_at | Date the task was updated |

## Laravel Structure

The project demonstrates the following Laravel concepts:

**Routes → Controller → Model → Database → Blade Views**

### Routes
Handles URLs and connects them to the appropriate controller methods.

### Controller
Handles the task operations such as creating, viewing, editing, updating, and deleting tasks.

### Model
The `Task` model communicates with the database.

### Database
Stores all task information.

### Blade Views
Displays the task manager interface to the user.

## CRUD Operations

### Create
Users can add a new task with a task name, description, status, and due date.

### Read
Users can view all saved tasks on the dashboard.

### Update
Users can edit task information and change the task status.

### Delete
Users can remove tasks that are no longer needed.

## How to Run

1. Clone the repository.
2. Open the project folder.
3. Install dependencies:

```bash
composer install
npm install