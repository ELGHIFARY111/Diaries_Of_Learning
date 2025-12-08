<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Report - Diary of Learning</title>
    <link rel="stylesheet" href="./views/css/guru.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

    <div class="container">
        <div class="content">

            <div class="header">
                <h2>Student Learning Progress Report</h2>
                <p>Analyze collective and individual student performance during this period.</p>
            </div>
            
            <div class="filter-options">
                <select>
                    <option>Period: This Month</option>
                    <option>Period: Overall</option>
                </select>
                <select>
                    <option>Metric: All Metrics</option>
                    <option>Metric: Writing</option>
                </select>
            </div>
            
            <div class="summary-cards">
                
                <div class="card">
                    <h3>Average Entries/Week</h3>
                    <p class="value"><?= $stats['avg_mingguan'] ?></p> 
                    <p class="indicator">entries per week (This Month)</p>
                </div>
                
                <div class="card">
                    <h3>Total Vocabulary Collected</h3>
                    <p class="value"><?= $stats['total_words'] ?></p>
                    <p class="indicator">words collected by all students</p>
                </div>
                
                <div class="card">
                    <h3>Teacher Feedback Ratio</h3>
                    <p class="value"><?= $stats['feedback_ratio'] ?>%</p>
                    
                    <?php if($stats['feedback_ratio'] < 50): ?>
                        <p class="indicator red" style="color: #e74c3c;">▼ Needs attention</p>
                    <?php else: ?>
                        <p class="indicator" style="color: #27ae60;">▲ Good performance</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="chart-area">
                <h3>Daily Writing Activity (Last 7 Days)</h3>
                <div class="graph-placeholder" style="background: white; border: none; padding: 10px;">
                    <canvas id="chartActivity"></canvas>
                </div>
            </div>
            
            <div class="chart-area">
                <h3>Accumulated New Vocabulary Discovery (5 Months)</h3>
                <div class="graph-placeholder" style="background: white; border: none; padding: 10px;">
                    <canvas id="chartVocab"></canvas>
                </div>
            </div>
            
            <p style="text-align: center; margin-top: 30px;">
                <button onclick="window.print()" class="download-btn" style="cursor: pointer; background: none; border: none; font-inherit: inherit;">
                    ⬇ Download / Print Report (PDF)
                </button>
            </p>

        </div>

    </div>

    <script>
        const dataActivity = {
            labels: <?= $stats['chart1_labels'] ?>,
            datasets: [{
                label: 'Entries',
                data: <?= $stats['chart1_data'] ?>,
                backgroundColor: '#6c5ce7',
                borderRadius: 4
            }]
        };

        const dataVocab = {
            labels: <?= $stats['chart2_labels'] ?>,
            datasets: [{
                label: 'Total Vocabulary',
                data: <?= $stats['chart2_data'] ?>,
                borderColor: '#00cec9',
                backgroundColor: 'rgba(0, 206, 201, 0.1)',
                fill: true,
                tension: 0.4
            }]
        };

        new Chart(document.getElementById('chartActivity'), {
            type: 'bar',
            data: dataActivity,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { 
                    y: { beginAtZero: true, grid: { color: '#f0f0f0' } },
                    x: { grid: { display: false } }
                }
            }
        });

        new Chart(document.getElementById('chartVocab'), {
            type: 'line',
            data: dataVocab,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { 
                    y: { beginAtZero: true, grid: { color: '#f0f0f0' } },
                    x: { grid: { display: false } }
                }
            }
        });
    </script>

</body>
</html>