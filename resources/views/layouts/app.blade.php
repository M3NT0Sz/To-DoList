<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To-Do List')</title>
    @vite('resources/scss/app.scss')
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('parts.header')
        @include('parts.sidebar')
        <main class="app-main">
            @include('parts.content-header')
            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    @yield('js')
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @isset($labels)
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const ctx = document.getElementById('tasks-chart').getContext('2d');
                if (!ctx) {
                    console.error('Canvas element with id "tasks-chart" not found.');
                    return;
                }
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: @json($labels),
                        datasets: [
                            {
                                label: 'Tarefas feitas',
                                data: @json($feitas),
                                borderColor: '#0d6efd',
                                backgroundColor: 'rgb(13, 110, 253,0.2)',
                                fill: true,
                                tension: 0.3
                            },
                            {
                                label: 'Tarefas a fazer',
                                data: @json($aFazer),
                                borderColor: '#6c757d',
                                backgroundColor: 'rgba(108, 117, 125, 0.2)',
                                fill: true,
                                tension: 0.3
                            }
                        ]
                    },
                    options: {
                        plugins: {
                            legend: {
                                display: false
                            }
                        }
                    }
                });
            })
        </script>
    @endisset
</body>

</html>