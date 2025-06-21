<?php
session_start();

// Check if user is logged in (session variable should be set)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Load the students data from the JSON file
$studentsData = json_decode(file_get_contents('students.json'), true);

$year = $_GET['year'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Placement Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        nav {
            background-color: #333;
            padding: 10px 0;
            text-align: center;
        }

        nav a {
            color: white;
            font-size: 1rem;
            padding: 10px 20px;
            text-decoration: none;
            margin: 0 15px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #4e73df;
            border-radius: 5px;
        }

        /* Active link */
        nav .active {
            background-color: #4e73df;
            border-radius: 5px;
        }

        header {
            text-align: center;
            margin-bottom: 40px;
        }

        header h1 {
            font-size: 2.5rem;
            color: #333;
        }

        header p {
            font-size: 1.1rem;
            color: #666;
        }
        

        .year-selector {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            gap: 10px;
            flex-wrap: wrap;
        }

        .year-selector button {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #4e73df;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .year-selector button:hover {
            background-color: #3e59d3;
        }

        .charts {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 40px;
        }

        .chart {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 48%;
        }

        .student-table {
            margin-top: 30px;
            border-collapse: collapse;
            width: 100%;
        }

        .student-table th, .student-table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .student-table th {
            background-color: #4e73df;
            color: white;
        }

        @media (max-width: 768px) {
            .charts {
                flex-direction: column;
            }

            .chart {
                width: 100%;
            }

            .card {
                width: 80%;
            }
        }
    </style>
</head>
<body>
<nav>
        <a href="home.php">Home</a>
        <a href="about.php">About</a>
        <a href="members.php">Members</a>
        <a href="events.php">Events</a>
    </nav>
    <div class="container">
        <header>
            <h1>Alumni Placement Dashboard</h1>
            <p>Welcome to the Alumni Placement Dashboard. Here you can find placement trends, top companies, and placement officer details.</p>
        </header>

        <section class="year-selector">
            <?php for ($i = 2021; $i <= 2025; $i++): ?>
                <button onclick="loadYearData(<?php echo $i; ?>)"><?php echo $i; ?></button>
            <?php endfor; ?>
        </section>

        <section class="charts">
            <div class="chart">
                <h2>Placement Trends (2003–2025)</h2>
                <canvas id="placementBarChart"></canvas>
            </div>
            <div class="chart">
                <h2>Top Companies with Student Placements</h2>
                <canvas id="placementPieChart" width="300" height="300"></canvas>
            </div>
        </section>

        <section class="placement-officer">
            <h2>Placement Officer Contact Details</h2>
            <div class="card">
                <p><strong>Name:</strong> Prof. J. PRASANNA KUMAR</p>
                <p><strong>Email:</strong> placements@mvsrec.edu.in</p>
                <p><strong>Phone:</strong> 9885921778</p>
            </div>
        </section>

        <?php if ($year && isset($studentsData[$year])): ?>
            <section class="student-data">
                <h2>Student Placements for <?php echo $year; ?></h2>
                <table class="student-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Branch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($studentsData[$year] as $student): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($student['name']); ?></td>
                                <td><?php echo htmlspecialchars($student['company']); ?></td>
                                <td><?php echo htmlspecialchars($student['branch']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        <?php endif; ?>
    </div>

    <script>
        function loadYearData(year) {
            window.location.href = "?year=" + year;
        }

        const placementData = {
            labels: ['2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015', '2016', '2017', '2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025'],
            datasets: [{
                label: 'Number of Students Placed',
                data: [19, 74, 145, 188, 274, 324, 244, 294, 505, 613, 494, 411, 503, 842, 784, 440, 717, 647, 839, 1355, 672, 282, 142],
                backgroundColor: '#4e73df',
                borderColor: '#4e73df',
                borderWidth: 1
            }]
        };

        const ctxBar = document.getElementById('placementBarChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: placementData,
            options: {
                responsive: true,
                scales: {
                    x: { beginAtZero: true },
                    y: { beginAtZero: true }
                }
            }
        });

        const placementCompaniesData = {
            labels: ['Accenture', 'LTIMindtree', 'Cognizant', 'ZF', 'Cognida'],
            datasets: [{
                data: [300, 250, 200, 150, 100],
                backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#FF33A8', '#F1C40F'],
                hoverOffset: 4
            }]
        };

        const ctxPie = document.getElementById('placementPieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'pie',
            data: placementCompaniesData,
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: {
                        callbacks: {
                            label: function (tooltipItem) {
                                return `${tooltipItem.label}: ${tooltipItem.raw} students`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
