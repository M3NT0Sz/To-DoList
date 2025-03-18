@extends('layouts.app')

@section('title', 'To-Do List | Index')
@section('page-title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Tasks</h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="position-relative mb-4">
                        <canvas id="tasks-chart"></canvas>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                        <span class="me-2">
                            <i class="bi bi-square-fill text-primary"></i> Tarefas Feitas
                        </span>
                        <span> <i class="bi bi-square-fill text-secondary"></i> Tarefas a Fazer </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection