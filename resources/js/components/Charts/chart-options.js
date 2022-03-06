const chartOptions = {
    scales: {
        yAxes: [
            {
                stacked: true,
                ticks: {
                    beginAtZero: true,
                    min: 0,
                },
            },
        ],
        xAxes: [
            {
                stacked: true,
                ticks: {
                    beginAtZero: true,
                    categoryPercentage: 0.5,
                    barPercentage: 1,
                },
            },
        ],
    },
    responsive: true,
    maintainAspectRation: false,
};

export default chartOptions;