document.addEventListener('DOMContentLoaded', () => {
    fetch('../../position.txt')
        .then(response => response.text())
        .then(contents => {
            const data = processFile(contents);
            drawChart(data);
        })
        .catch(error => console.error('Error fetching file:', error));
});

function processFile(contents) {
    const lines = contents.split('\n');
    const diseaseCounts = {};

    lines.forEach(line => {
        const parts = line.split('\t');
        if (parts.length > 0) {
            const disease = parts[0];
            if (diseaseCounts[disease]) {
                diseaseCounts[disease]++;
            } else {
                diseaseCounts[disease] = 1;
            }
        }
    });

    return diseaseCounts;
}

function drawChart(data) {
    const ctx = document.getElementById('myChart').getContext('2d');
    const labels = Object.keys(data);
    const values = Object.values(data);
    const colors = ['#1f77b4', '#ff7f0e', '#2ca02c', '#d62728', '#9467bd', '#8c564b', '#e377c2', '#7f7f7f', '#bcbd22', '#17becf'];

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: '# of Occurrences',
                data: values,
                backgroundColor: colors.slice(0, values.length),
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.raw || 0;
                            const total = context.chart._metasets[context.datasetIndex].total;
                            const percentage = ((value / total) * 100).toFixed(2);
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
}
