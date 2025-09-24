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
        <div id="year-filter-container" style="margin-bottom: 1rem;"></div>
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const labels = @json($labels);
                const feitas = @json($feitas);
                const aFazer = @json($aFazer);
                // Extrai anos apenas se o label começar com 4 dígitos (ano)
                const years = [...new Set(labels.map(l => /^\d{4}/.test(l) ? l.substring(0, 4) : null).filter(Boolean))].map(Number).sort((a, b) => a - b);
                const yearFilterContainer = document.getElementById('year-filter-container');

                let selectedYear = years.length > 0 ? new Date().getFullYear() : null;
                if (years.length > 0 && !years.includes(selectedYear)) selectedYear = years[0];
                let currentIndex = years.indexOf(selectedYear);

                function updateButtons() {
                    document.getElementById('prev-year').disabled = currentIndex <= 0;
                    document.getElementById('next-year').disabled = currentIndex >= years.length - 1;
                }

                yearFilterContainer.innerHTML = `
                    <div style="display: flex; align-items: center; gap: 1rem;">
                        <button id="prev-year" type="button" class="btn btn-outline-secondary btn-sm">&lt;</button>
                        <span id="selected-year" style="font-weight: bold; font-size: 1.2rem;">${selectedYear}</span>
                        <button id="next-year" type="button" class="btn btn-outline-secondary btn-sm">&gt;</button>
                    </div>
                `;

                document.getElementById('prev-year').onclick = function() {
                    if (currentIndex > 0) {
                        currentIndex--;
                        selectedYear = years[currentIndex];
                        document.getElementById('selected-year').textContent = selectedYear;
                        renderChart(selectedYear);
                        updateButtons();
                    }
                };
                document.getElementById('next-year').onclick = function() {
                    if (currentIndex < years.length - 1) {
                        currentIndex++;
                        selectedYear = years[currentIndex];
                        document.getElementById('selected-year').textContent = selectedYear;
                        renderChart(selectedYear);
                        updateButtons();
                    }
                };

                updateButtons();

                const ctx = document.getElementById('tasks-chart').getContext('2d');
                if (!ctx) {
                    console.error('Canvas element with id "tasks-chart" not found.');
                    return;
                }

                function getFilteredData(selectedYear) {
                    // Sempre retorna 12 meses, preenchendo com zero se não houver dados
                    const filteredLabels = [];
                    const filteredFeitas = [];
                    const filteredAFazer = [];
                    for (let m = 1; m <= 12; m++) {
                        const label = `${selectedYear}-${String(m).padStart(2, '0')}`;
                        const idx = labels.indexOf(label);
                        filteredLabels.push(label);
                        filteredFeitas.push(idx !== -1 ? feitas[idx] : 0);
                        filteredAFazer.push(idx !== -1 ? aFazer[idx] : 0);
                    }
                    return { filteredLabels, filteredFeitas, filteredAFazer };
                }

                function getMonthName(label) {
                    const month = parseInt(label.split('-')[1], 10);
                    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    return months[month - 1];
                }

                let chart;
                function renderChart(year) {
                    const { filteredLabels, filteredFeitas, filteredAFazer } = getFilteredData(year);
                    const monthLabels = filteredLabels.map(getMonthName);
                    if (chart) chart.destroy();
                    chart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: monthLabels,
                            datasets: [
                                {
                                    label: 'Tarefas feitas',
                                    data: filteredFeitas,
                                    borderColor: '#0d6efd',
                                    backgroundColor: 'rgb(13, 110, 253,0.2)',
                                    fill: true,
                                    tension: 0.3
                                },
                                {
                                    label: 'Tarefas a fazer',
                                    data: filteredAFazer,
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
                }

                // Renderiza o gráfico inicialmente
                renderChart(selectedYear);
            });
        </script>
    @endisset
</body>

</html>