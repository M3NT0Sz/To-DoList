
document.addEventListener("DOMContentLoaded", function () {
    const data = {
        feitas: [0, 10, 5, 2, 20],
        aFazer: [20, 10, 15, 18, 0]
    };
    const ctx = document.getElementById('tasks-chart').getContext('2d');
    if (!ctx) {
        console.error('Canvas element with id "tasks-chart" not found.');
        return;
    }
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Tarefas feitas',
                    data: data.feitas,
                    borderColor: '#0d6efd',
                    backgroundColor:'rgb(13, 110, 253,0.2)',
                    fill: true,
                    tension: 0.3
                },
                {
                    label: 'Tarefas a fazer',
                    data: data.aFazer,
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