<?php
session_start();

// Check if user is logged in (session variable should be set)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Sample job data (for now, you can use an array or a mock database)
$jobs = [
    ['title' => 'Software Developer', 'company' => 'Wipro', 'location' => 'New York', 'type' => 'Full-Time', 'description' => 'Software development job.'],
    ['title' => 'Data Analyst', 'company' => 'Amazon', 'location' => 'Los Angeles', 'type' => 'Part-Time', 'description' => 'Analyze data for insights.'],
    ['title' => 'Web Designer', 'company' => 'Accenture', 'location' => 'San Francisco', 'type' => 'Internship', 'description' => 'Design websites and web pages.'],
    ['title' => 'Software Developer', 'company' => 'Flipkart', 'location' => 'Hyderabad', 'type' => 'Full-Time', 'description' => 'Software development job.'],
    ['title' => 'Data Analyst', 'company' => 'Deloitte', 'location' => 'Bangalore', 'type' => 'Part-Time', 'description' => 'Analyze data for insights.'],
    ['title' => 'Web Designer', 'company' => 'Deloitte', 'location' => 'Pune', 'type' => 'Internship', 'description' => 'Design websites and web pages.'],
    ['title' => 'Mobile App Developer', 'company' => 'Infosys', 'location' => 'Noida', 'type' => 'Full-Time', 'description' => 'Develop mobile applications.'],
    ['title' => 'Frontend Developer', 'company' => 'Infosys', 'location' => 'Gurgaon', 'type' => 'Full-Time', 'description' => 'Build and design user interfaces.'],
    ['title' => 'Backend Developer', 'company' => 'Accenture', 'location' => 'Hyderabad', 'type' => 'Part-Time', 'description' => 'Work on the server side of web applications.'],
    ['title' => 'Data Scientist', 'company' => 'Accenture', 'location' => 'Bangalore', 'type' => 'Full-Time', 'description' => 'Analyze large datasets to identify trends.'],
    ['title' => 'UI/UX Designer', 'company' => 'E2open', 'location' => 'Pune', 'type' => 'Internship', 'description' => 'Design user experiences and interfaces.'],
    ['title' => 'Network Engineer', 'company' => 'Data economy', 'location' => 'Noida', 'type' => 'Full-Time', 'description' => 'Manage and troubleshoot network systems.'],
    ['title' => 'Cloud Engineer', 'company' => 'Wipro', 'location' => 'Gurgaon', 'type' => 'Full-Time', 'description' => 'Design and manage cloud infrastructure.'],
    ['title' => 'Quality Assurance Analyst', 'company' => 'Modak', 'location' => 'Hyderabad', 'type' => 'Part-Time', 'description' => 'Test and verify software applications.'],
    ['title' => 'System Administrator', 'company' => 'Mindtree', 'location' => 'Bangalore', 'type' => 'Full-Time', 'description' => 'Manage and maintain IT infrastructure.'],
    ['title' => 'Full Stack Developer', 'company' => 'TCS', 'location' => 'Pune', 'type' => 'Full-Time', 'description' => 'Work on both frontend and backend development.'],
    ['title' => 'DevOps Engineer', 'company' => 'Modak', 'location' => 'Noida', 'type' => 'Full-Time', 'description' => 'Implement and manage DevOps processes.'],
    ['title' => 'AI Researcher', 'company' => 'ZeroCode', 'location' => 'Gurgaon', 'type' => 'Internship', 'description' => 'Conduct research in Artificial Intelligence.'],


    // Add more job listings as needed
];

// Check if there is a search query for job title
$searchQuery = isset($_GET['search-title']) ? strtolower($_GET['search-title']) : '';
$filteredJobs = [];

foreach ($jobs as $job) {
    if ($searchQuery && strpos(strtolower($job['title']), $searchQuery) === false) {
        continue;
    }
    $filteredJobs[] = $job;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Job Portal</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e0f2f1;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #004d40;
            color: #fff;
            padding: 1.5em 0;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
    font-size: 2.5rem;
    color: #333;
}

/* Navigation Bar Styling */
nav {
    
    padding: 10px;
    margin-bottom: 20px;
}

nav ul {
    display: flex;
    justify-content: center;
    list-style-type: none;
    padding: 0;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 1.2rem;
    font-weight: bold;
}

nav ul li a:hover,
nav ul li a.active {
    color: #ffdd57;
}

        main {
            padding: 2em;
        }

        section {
            margin-bottom: 2.5em;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 2.5em;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        h2 {
            margin-top: 0;
            color: #004d40;
            font-size: 1.75em;
            margin-bottom: 1em;
            border-bottom: 2px solid #004d40;
            padding-bottom: 0.5em;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 1em;
            font-weight: bold;
            color: #004d40;
            font-size: 1.1em;
        }

        input,
        textarea,
        select {
            margin-top: 0.5em;
            padding: 0.75em;
            border: 2px solid #004d40;
            border-radius: 8px;
            background-color: #f4f4f4;
            transition: background-color 0.3s, border-color 0.3s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            background-color: #e0f7fa;
            border-color: #00796b;
            outline: none;
        }

        button {
            padding: 0.75em;
            background-color: #004d40;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1.1em;
            margin-top: 1.5em;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #00796b;
            transform: translateY(-2px);
        }

        #search-filters form {
            display: flex;
            flex-wrap: wrap;
            gap: 1em;
        }

        #search-filters label,
        #search-filters input,
        #search-filters select {
            flex: 1;
            min-width: 200px;
        }

        #job-listings .job {
            border-bottom: 1px solid #ddd;
            padding-bottom: 1em;
            margin-bottom: 1em;
        }

        #job-listings .job:last-child {
            border-bottom: none;
        }

        .job {
            border: 1px solid #004d40;
            border-radius: 8px;
            padding: 1.5em;
            background-color: #fafafa;
            margin-bottom: 1.5em;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .job:hover {
            background-color: #f1f1f1;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <header>
 <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li> <!-- Corrected link -->
                <li><a href="members.php">Members</a></li>
                <li><a href="events.php">Events</a></li>
                            </ul>
        </nav>

        <h1>Alumni Job Portal</h1>
    </header>

    <main>
        <section id="search-filters">
            <h2 style="text-align: center; font-family: 'Times New Roman', Times, serif; font-size: 230%;">Search & Filter</h2>
            <form id="search-form" method="GET" action="jobportal.php">
                <label for="search-title">Search by Job Title:</label>
                <input type="text" id="search-title" name="search-title" value="<?= isset($_GET['search-title']) ? htmlspecialchars($_GET['search-title']) : '' ?>">

                <label for="search-location">Location:</label>
                <input type="text" id="search-location" name="search-location">

                <label for="search-type">Job Type:</label>
                <select id="search-type" name="search-type">
                    <option value="">All Types</option>
                    <option value="Full-Time">Full-Time</option>
                    <option value="Part-Time">Part-Time</option>
                    <option value="Internship">Internship</option>
                </select>

                <button type="submit">Search</button>
            </form>
        </section>

        <section id="job-listings">
            <h2>Job Listings</h2>
            <div id="jobs">
                <?php if (count($filteredJobs) > 0): ?>
                    <?php foreach ($filteredJobs as $job): ?>
                        <div class="job">
                            <h3><?= htmlspecialchars($job['title']) ?></h3>
                            <p><strong>Company:</strong> <?= htmlspecialchars($job['company']) ?></p>
                            <p><strong>Location:</strong> <?= htmlspecialchars($job['location']) ?></p>
                            <p><strong>Job Type:</strong> <?= htmlspecialchars($job['type']) ?></p>
                            <p><strong>Description:</strong> <?= htmlspecialchars($job['description']) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No jobs found matching your search criteria.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>

</body>

</html>

