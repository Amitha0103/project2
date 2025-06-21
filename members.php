<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Alumni Members - Meet Our Esteemed Alumni">
    <title>Members - Alumni Association</title>
    <style>
        /* General Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f7fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Header Styling */
        header {
            background-color: #0044cc;
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        header .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        header h1 {
            font-size: 2.8rem;
            margin-bottom: 10px;
        }

        header nav ul {
            list-style-type: none;
            padding: 0;
            margin: 10px 0 0;
        }

        header nav ul li {
            display: inline;
            margin: 0 20px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
        }

        header nav ul li a:hover,
        header nav ul li a.active {
            font-weight: bold;
            border-bottom: 2px solid #ffcb00;
        }

        /* Members Section Styling */
        .members {
            padding: 60px 0;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .members .container {
            width: 80%;
            margin: 0 auto;
            max-width: 1200px;
        }

        .members h2 {
            font-size: 2.5rem;
            color: #0044cc;
            text-align: center;
            margin-bottom: 20px;
        }

        .members p {
            font-size: 1.2rem;
            margin-bottom: 40px;
            text-align: center;
            color: #555;
        }

        /* Search Bar Styling */
        .search-bar {
            text-align: center;
            margin-bottom: 40px;
            background-color: #e6f0ff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .search-bar input {
            padding: 15px;
            font-size: 1.1rem;
            width: 60%;
            max-width: 500px;
            border-radius: 8px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: border 0.3s ease-in-out;
        }

        .search-bar input:focus {
            outline: none;
            border-color: #0044cc;
            box-shadow: 0 0 8px rgba(0, 68, 204, 0.5);
        }

        /* Members List Layout */
        .members-list {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        /* Individual Member Card */
        .member {
            background-color: #f9f9f9;
            padding: 25px;
            width: 280px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .member:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .member h3 {
            font-size: 1.8rem;
            color: #0044cc;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .member p {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #666;
        }

        .member p strong {
            color: #0044cc;
        }

        .member .courses a {
            color: #0044cc;
            text-decoration: none;
        }

        /* Footer Styling */
        footer {
            background-color: #333;
            color: white;
            padding: 30px 0;
            text-align: center;
            margin-top: 40px;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }

        footer p {
            font-size: 1rem;
        }

        footer nav ul {
            list-style-type: none;
            padding: 0;
            margin-top: 10px;
        }

        footer nav ul li {
            display: inline;
            margin: 0 20px;
        }

        footer nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
        }

        footer nav ul li a:hover {
            text-decoration: underline;
        }

        /* Responsive Design for Smaller Screens */
        @media (max-width: 768px) {
            .members-list {
                flex-direction: column;
                align-items: center;
            }

            .search-bar input {
                width: 80%;
            }

            .member {
                width: 90%;
            }
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <header>
        <div class="container">
            <h1>Alumni Association</h1>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="members.php" class="active">Members</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content Section -->
    <section class="members">
        <div class="container">
            <h2>Our Esteemed Members</h2>

            <!-- Search Bar for Domain -->
            <div class="search-bar">
                <input type="text" id="search-input" placeholder="Enter domain to search members..." onkeyup="searchMembers()">
            </div>

            <!-- Members List -->
            <div class="members-list" id="members-list">
                <!-- Member 1 -->
                <div class="member" data-domain="AI">
                    <h3>Namitha</h3>
                    <p><strong>Graduation Year:</strong> 2025</p>
                    <p><strong>Industry:</strong> Technology</p>
                    <p><strong>Domain:</strong> AI</p>
                    <p><strong>Current Role:</strong> Student</p>
                    <p><strong>Contact No.:</strong> 9876543210</p>
                    <div class="courses">
                        <p><strong>Courses & Internships:</strong></p>
                        <ul>
                            <li><a href="https://www.coursera.org/learn/ai-for-everyone">AI for Everyone (Coursera)</a></li>
                            <li><a href="https://www.linkedin.com/learning/ai-for-business-leaders">AI for Business Leaders (LinkedIn Learning)</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Member 2 -->
                <div class="member" data-domain="ML">
                    <h3>Abhigna</h3>
                    <p><strong>Graduation Year:</strong> 2022</p>
                    <p><strong>Industry:</strong> Computer Science</p>
                    <p><strong>Domain:</strong> Machine Learning</p>
                    <p><strong>Current Role:</strong> Financial Analyst at SBI</p>
                    <p><strong>Contact No.:</strong> 9123456789</p>
                    <div class="courses">
                        <p><strong>Courses & Internships:</strong></p>
                        <ul>
                            <li><a href="https://www.coursera.org/specializations/machine-learning">Machine Learning Specialization (Coursera)</a></li>
                            <li><a href="https://www.linkedin.com/learning/machine-learning-for-business-leaders">Machine Learning for Business Leaders (LinkedIn Learning)</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Member 3 -->
                <div class="member" data-domain="Data Science">
                    <h3>Adhitya</h3>
                    <p><strong>Graduation Year:</strong> 2023</p>
                    <p><strong>Industry:</strong> Information Technology</p>
                    <p><strong>Domain:</strong> Data Science</p>
                    <p><strong>Current Role:</strong> Analyst at HealthCare Inc.</p>
                    <p><strong>Contact No.:</strong> 9876541230</p>
                    <div class="courses">
                        <p><strong>Courses & Internships:</strong></p>
                        <ul>
                            <li><a href="https://www.coursera.org/professional-certificates/data-science">Data Science Professional Certificate (Coursera)</a></li>
                            <li><a href="https://www.linkedin.com/learning/data-science-for-business-leaders">Data Science for Business Leaders (LinkedIn Learning)</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Member 4 -->
                <div class="member" data-domain="Data Analytics">
                    <h3>John</h3>
                    <p><strong>Graduation Year:</strong> 2019</p>
                    <p><strong>Industry:</strong> ECE</p>
                    <p><strong>Domain:</strong> Data Analytics</p>
                    <p><strong>Current Role:</strong> Junior Engineer at Accenture</p>
                    <p><strong>Contact No.:</strong> 9123456781</p>
                    <div class="courses">
                        <p><strong>Courses & Internships:</strong></p>
                        <ul>
                            <li><a href="https://www.coursera.org/learn/data-analytics-basics">Data Analytics Basics (Coursera)</a></li>
                            <li><a href="https://www.linkedin.com/learning/data-analytics-for-business">Data Analytics for Business (LinkedIn Learning)</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Member 5 -->
                <div class="member" data-domain="AI">
                    <h3>Sneha</h3>
                    <p><strong>Graduation Year:</strong> 2024</p>
                    <p><strong>Industry:</strong> AI & Robotics</p>
                    <p><strong>Domain:</strong> AI</p>
                    <p><strong>Current Role:</strong> Research Assistant</p>
                    <p><strong>Contact No.:</strong> 9081726354</p>
                    <div class="courses">
                        <p><strong>Courses & Internships:</strong></p>
                        <ul>
                            <li><a href="https://www.coursera.org/learn/ai-for-everyone">AI for Everyone (Coursera)</a></li>
                            <li><a href="https://www.linkedin.com/learning/artificial-intelligence-for-business-leaders">AI for Business Leaders (LinkedIn Learning)</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Member 6 -->
                <div class="member" data-domain="ML">
                    <h3>Rahul</h3>
                    <p><strong>Graduation Year:</strong> 2021</p>
                    <p><strong>Industry:</strong> Data Science</p>
                    <p><strong>Domain:</strong> ML</p>
                    <p><strong>Current Role:</strong> Machine Learning Engineer at Google</p>
                    <p><strong>Contact No.:</strong> 7894561230</p>
                    <div class="courses">
                        <p><strong>Courses & Internships:</strong></p>
                        <ul>
                            <li><a href="https://www.coursera.org/learn/machine-learning">Machine Learning by Andrew Ng (Coursera)</a></li>
                            <li><a href="https://www.linkedin.com/learning/machine-learning-foundations">Machine Learning Foundations (LinkedIn Learning)</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Member 7 -->
                <div class="member" data-domain="Cybersecurity">
                    <h3>Aishwarya</h3>
                    <p><strong>Graduation Year:</strong> 2020</p>
                    <p><strong>Industry:</strong> IT Security</p>
                    <p><strong>Domain:</strong> Cybersecurity</p>
                    <p><strong>Current Role:</strong> Security Analyst at TCS</p>
                    <p><strong>Contact No.:</strong> 9837456123</p>
                    <div class="courses">
                        <p><strong>Courses & Internships:</strong></p>
                        <ul>
                            <li><a href="https://www.coursera.org/learn/cyber-security-basics">Cybersecurity Basics (Coursera)</a></li>
                            <li><a href="https://www.linkedin.com/learning/cybersecurity-foundations">Cybersecurity Foundations (LinkedIn Learning)</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Member 8 -->
                <div class="member" data-domain="Data Science">
                    <h3>Vishal</h3>
                    <p><strong>Graduation Year:</strong> 2018</p>
                    <p><strong>Industry:</strong> Data Science</p>
                    <p><strong>Domain:</strong> Data Science</p>
                    <p><strong>Current Role:</strong> Data Scientist at Amazon</p>
                    <p><strong>Contact No.:</strong> 8956432109</p>
                    <div class="courses">
                        <p><strong>Courses & Internships:</strong></p>
                        <ul>
                            <li><a href="https://www.coursera.org/specializations/jhu-data-science">Data Science Specialization (Coursera)</a></li>
                            <li><a href="https://www.linkedin.com/learning/advanced-data-science">Advanced Data Science (LinkedIn Learning)</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Member 9 -->
                <div class="member" data-domain="Electronics">
                    <h3>Pradeep</h3>
                    <p><strong>Graduation Year:</strong> 2017</p>
                    <p><strong>Industry:</strong> Electronics</p>
                    <p><strong>Domain:</strong> Electronics</p>
                    <p><strong>Current Role:</strong> Electronics Engineer at Samsung</p>
                    <p><strong>Contact No.:</strong> 9023456789</p>
                    <div class="courses">
                        <p><strong>Courses & Internships:</strong></p>
                        <ul>
                            <li><a href="https://www.coursera.org/learn/electronics">Electronics Basics (Coursera)</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Member 10 -->
                <div class="member" data-domain="AI">
                    <h3>Riya</h3>
                    <p><strong>Graduation Year:</strong> 2025</p>
                    <p><strong>Industry:</strong> AI & Machine Learning</p>
                    <p><strong>Domain:</strong> AI</p>
                    <p><strong>Current Role:</strong> Intern at TechMinds</p>
                    <p><strong>Contact No.:</strong> 9876543212</p>
                    <div class="courses">
                        <p><strong>Courses & Internships:</strong></p>
                        <ul>
                            <li><a href="https://www.coursera.org/learn/ai-for-everyone">AI for Everyone (Coursera)</a></li>
                            <li><a href="https://www.linkedin.com/learning/artificial-intelligence-for-business-leaders">AI for Business Leaders (LinkedIn Learning)</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="container">
            <p>&copy; 2025 Alumni Association | All Rights Reserved</p>
            <nav>
                <ul>
                    <li><a href="privacy.html">Privacy Policy</a></li>
                    <li><a href="terms.html">Terms of Service</a></li>
                </ul>
            </nav>
        </div>
    </footer>

    <script>
        // Store the original members list for resetting
        const originalMembers = Array.from(document.querySelectorAll('.member'));

        // Function to filter members based on the search input (domain)
        function searchMembers() {
            const searchInput = document.getElementById('search-input').value.toLowerCase();
            const membersList = document.getElementById('members-list');

            // If search input is empty, reset to original list
            if (searchInput === '') {
                membersList.innerHTML = '';
                originalMembers.forEach(member => membersList.appendChild(member));
            } else {
                // Filter members based on the domain input
                const filteredMembers = originalMembers.filter(member => {
                    const domain = member.getAttribute('data-domain').toLowerCase();
                    return domain.includes(searchInput); // Filters if domain includes the input text
                });

                // Update the members list based on the filtered result
                membersList.innerHTML = ''; // Clear existing members
                filteredMembers.forEach(member => membersList.appendChild(member)); // Append filtered members
            }
        }
    </script>

</body>

</html>
