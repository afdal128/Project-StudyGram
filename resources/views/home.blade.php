@extends('Layouts.main')
@section('container')
<div class="col">
    <div class="row flex-nowrap min-vh-100 py-3" data-bs-theme="light">
        <div class="col-auto col-md-3 ms-3 col-xl-2 px-sm-0 px-0 bg-primary-subtle border-end border-dark-subtle border-2" >
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white " >
                <form action="{{ route('showTasks') }}" method="POST">
                    @csrf
                <ul class="nav nav-underline flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
                    <li class="nav-item ">
                        <button type="submit" name="task_type" value="upcoming" class="nav-link text-dark {{($taskType === "coming") ? 'active' : ''}} align-middle px-0" >
                            <i class="bi bi-list-task"></i> <span class="ms-1 d-none d-sm-inline">tugas menanti</span>
                        </button>
                    </li>
                    <li>
                        <button type="submit" name="task_type" value="in_process" class="nav-link text-dark {{($taskType === "in_process") ? 'active' : ''}} px-0  align-middle" >
                            <i class="bi bi-list-task"></i> <span class="ms-1 d-none d-sm-inline">tugas proses</span></button>
                    </li>
                    <li>
                        <button type="submit" name="task_type" value="completed" class="nav-link  text-dark {{($taskType === "completed") ? 'active' : ''}} px-0  align-middle">
                            <i class="bi bi-list-task"></i> <span class="ms-1 d-none d-sm-inline">tugas selesai</span></button>
                    </li>
                </ul>
            </form>    
            </div>
            <hr class="border border-dark border-2 ">
            @if (isset($tasks))
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
                        @foreach ($tasks as $task)
                        <form action="/task-detail" method="POST">
                            @csrf
                        <li class="nav-item"  >
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <input type="hidden" name="task_type" value="{{ $taskType ?? ''}}">
                            <button type="submit" class="nav-link text-dark align-middle px-0">
                                <i class="bi bi-arrow-right"></i> <span class="ms-1 d-none d-sm-inline">{{$task->name}}</span>
                            </button>
                        </li> 
                        </form>
                        @endforeach
                    </ul>   
                </div>
            @endif
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white">
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start " id="menu">
                    <li>
                        <button  type="button" data-bs-toggle="modal" data-bs-target="#addTaskModal" class="nav-link text-dark align-middle px-0" >
                            <i class="bi bi-plus-square-fill"></i> <span class="ms-1 d-none d-sm-inline">tambah tugas</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div> 
        <div class=" col bg-primary-subtle py-3 me-3">
            @if (isset($selectedTask))
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-dark"> 
                        <h2 style="width:100%" class="fw-medium pb-2 border-bottom border-dark border-2"> {{ $selectedTask->name}}</h2><br>
                        <p style="font-family: 'roboto' " 
                        class="fw-normal lh-base">{{ $selectedTask->description}}
                        <br><br><span class="fw-bold ">{{ $selectedTask->status}}</span></p> 
                        <p>Dikumpul: <span class="fw-bold fst-italic">"{{ $selectedTask->due_date}}"</span></p>  
                </div><br><br><br>
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTaskModal" > 
                    <i class="bi bi-pencil-square"></i> Edit</button>
                <a  href="{{ route('deleteTask', ['taskId' => $selectedTask->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')" class="btn btn-outline-dark mx-3">
                    <i class="bi bi-trash-fill"></i>Hapus</a>
            @endif
           </div> 
    </div>
</div> 
@endsection
@section('modal')
    @include('layouts.modal')
    @if (isset($selectedTask))
    @include('layouts.edit-modal', ['selectedTask' => $selectedTask])
    @endif
@endsection
