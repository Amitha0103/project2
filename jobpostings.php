<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Jobs - Alumni Association</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            padding: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }
        header h1 {
    font-size: 2.5rem;
    color: #333;
}

/* Navigation Bar Styling */
nav {
    background-color: #0044cc;
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


        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #job-list {
            margin-top: 20px;
        }

        #jobs {
            list-style-type: none;
            padding: 0;
        }

        .job-item {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .job-item h3 {
            margin-bottom: 10px;
        }

        .job-item p {
            margin-bottom: 5px;
        }

        #post-job-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            width: 400px;
        }

        .close-btn {
            font-size: 25px;
            color: #aaa;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        form label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        form input, form textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        .apply-link {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #4CAF50;
        }

        .apply-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
 <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li> <!-- Corrected link -->
                <li><a href="members.php">Members</a></li>
                <li><a href="events.php">Events</a></li>
                
            </ul>
        </nav>

    <header>
        <h1>Alumni Association - Available Jobs</h1>
        <button id="post-job-btn">Post a Job</button>
    </header>
    
    <section id="job-list">
        <h2>Available Jobs</h2>
        <ul id="jobs">
            <!-- Jobs will be dynamically added here -->
        </ul>
    </section>
    
    <!-- Post Job Modal -->
    <div id="post-job-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Post a Job</h2>
            <form id="post-job-form">
                <label for="job-title">Job Title:</label>
                <input type="text" id="job-title" required>
                
                <label for="job-description">Job Description:</label>
                <textarea id="job-description" required></textarea>
                
                <label for="job-location">Location:</label>
                <input type="text" id="job-location" required>
                
                <label for="job-salary">Salary:</label>
                <input type="text" id="job-salary" required>
                
                <label for="job-apply-link">Apply Link:</label>
                <input type="url" id="job-apply-link" placeholder="https://apply-link.com" required>
                
                <button type="submit">Post Job</button>
            </form>
        </div>
    </div>

    <script>
        // Select elements
        const postJobBtn = document.getElementById('post-job-btn');
        const postJobModal = document.getElementById('post-job-modal');
        const closeBtn = document.querySelector('.close-btn');
        const postJobForm = document.getElementById('post-job-form');
        const jobList = document.getElementById('jobs');

        // Load stored jobs from localStorage
        let jobs = JSON.parse(localStorage.getItem('jobs')) || [];

        // Open the modal to post a job
        postJobBtn.addEventListener('click', () => {
            postJobModal.style.display = 'flex';
        });

        // Close the modal
        closeBtn.addEventListener('click', () => {
            postJobModal.style.display = 'none';
        });

        // Handle job posting
        postJobForm.addEventListener('submit', (event) => {
            event.preventDefault();

            // Get form values
            const jobTitle = document.getElementById('job-title').value;
            const jobDescription = document.getElementById('job-description').value;
            const jobLocation = document.getElementById('job-location').value;
            const jobSalary = document.getElementById('job-salary').value;
            const jobApplyLink = document.getElementById('job-apply-link').value;

            // Create a new job object
            const newJob = {
                title: jobTitle,
                description: jobDescription,
                location: jobLocation,
                salary: jobSalary,
                applyLink: jobApplyLink
            };

            // Add the new job to the jobs array
            jobs.push(newJob);

            // Store jobs in localStorage
            localStorage.setItem('jobs', JSON.stringify(jobs));

            // Add the new job to the job list on the page
            addJobToPage(newJob);

            // Reset form and close modal
            postJobForm.reset();
            postJobModal.style.display = 'none';
        });

        // Add job to the page
        function addJobToPage(job) {
            const jobItem = document.createElement('li');
            jobItem.classList.add('job-item');
            jobItem.innerHTML = `
                <h3>${job.title}</h3>
                <p><strong>Description:</strong> ${job.description}</p>
                <p><strong>Location:</strong> ${job.location}</p>
                <p><strong>Salary:</strong> ${job.salary}</p>
                <a href="${job.applyLink}" class="apply-link" target="_blank">Apply Here</a>
            `;
            jobList.appendChild(jobItem);
        }

        // Initialize the available jobs (if any)
        function initJobs() {
            jobs.forEach(job => addJobToPage(job));
        }

        // Initialize when page loads
        window.onload = initJobs;
    </script>
</body>
</html>

