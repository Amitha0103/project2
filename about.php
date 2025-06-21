<?php
session_start();

// Check if user is logged in (session variable should be set)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Association - About</title>
    <style>
        /* Global Reset and Box Model */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Basic body styles */
        body {
            font-family: 'Roboto', sans-serif;
            color: #333;
            background-color: #f9f9f9;
            line-height: 1.6;
        }

        /* Header and Navigation */
        header {
            background: #004d40;
            padding: 1rem 0;
        }

        header nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
        }

        header nav ul li {
            margin: 0 1.5rem;
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2rem;
            text-transform: uppercase;
            padding: 0.5rem 1rem;
            transition: background 0.3s ease;
        }

        header nav ul li a:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        /* About Section */
        .about-section {
            padding: 4rem 2rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        .about-section h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            text-align: center;
            font-weight: 700;
        }

        .about-section p {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .about-section img {
            width: 100%;
            max-width: 500px;
            display: block;
            margin: 0 auto;
            border-radius: 10px;
        }

        /* Footer */
        footer {
            background: #004d40;
            color: #fff;
            text-align: center;
            padding: 1.5rem 0;
            position: relative;
            bottom: 0;
            width: 100%;
            font-size: 0.9rem;
        }

        footer p {
            margin: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header nav ul {
                flex-direction: column;
                align-items: center;
            }

            header nav ul li {
                margin: 0.5rem 0;
            }

            .about-section h1 {
                font-size: 2.5rem;
            }

            .about-section p {
                font-size: 1.1rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li> <!-- Corrected link -->
                <li><a href="about.php">About</a></li>
                <li><a href="members.php">Members</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="donation.php">Donations</a></li>
                <li><a href="jobportal.php">Job Postings</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
    </header>

    <main id="about">
        <section class="about-section">
            <h1>About Us</h1>
            <p>Welcome to the Alumni Association! Our mission is to connect and engage alumni, share knowledge and resources, and provide opportunities for continued personal and professional growth. We are dedicated to building a strong network that supports our alumni, fosters relationships, and provides a platform for future generations to grow.</p>
            <p>Established in 1981, the Alumni Association has grown to include thousands of members who represent diverse industries, locations, and experiences. Whether you’re here to reconnect with old friends or explore new opportunities, we welcome you to be part of this vibrant community.</p>
            <img src="mvsr.jpeg" alt="Alumni Association" />
            <p>We organize various events, webinars, and networking opportunities to ensure that our alumni stay connected, informed, and inspired. Join us as we celebrate the past and look forward to the future!</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Alumni Association. All rights reserved.</p>
    </footer>

    <script>
        // Typewriter effect for about heading
        document.addEventListener("DOMContentLoaded", function() {
            const heading = document.querySelector('.about-section h1');
            const text = heading.textContent;
            heading.textContent = '';
            let index = 0;

            function typeWriter() {
                if (index < text.length) {
                    heading.textContent += text.charAt(index);
                    index++;
                    setTimeout(typeWriter, 100);
                }
            }

            typeWriter();
        });
    </script>
</body>

</html>


