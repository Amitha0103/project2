<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Alumni Events - Stay Updated with Our Alumni Activities">
    <title>Events - Alumni Association</title>
    <style>
        /* Body and General Styling */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f4f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* Header Styles */
        header {
            background-color: #0044cc;
            color: white;
            padding: 20px 0;
        }

        header .container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        header nav ul {
            list-style-type: none;
            padding: 0;
        }

        header nav ul li {
            display: inline;
            margin: 0 15px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
        }

        header nav ul li a.active {
            font-weight: bold;
        }

        /* Main Content Section */
        .content {
            display: flex;
            justify-content: space-between;
            padding: 40px;
        }

        .events,
        .registered-events {
            width: 48%;
        }

        /* Events Section Styles */
        .events h2,
        .registered-events h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .events p {
            font-size: 1.2rem;
            margin-bottom: 40px;
            text-align: center;
        }

        .event {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .event h3 {
            font-size: 2rem;
            color: #0044cc;
            margin-bottom: 10px;
        }

        .event p {
            font-size: 1.1rem;
            margin-bottom: 15px;
        }

        .register-btn {
            background-color: #0044cc;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .register-btn:hover {
            background-color: #0033aa;
        }

        /* Webinar Links Section */
        .webinar-links {
            width: 48%;
        }

        .webinar-links h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .webinar-links ul {
            list-style-type: none;
            padding: 0;
        }

        .webinar-links ul li {
            font-size: 1.2rem;
            padding: 15px;
            background-color: #ffffff;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .webinar-links ul li a {
            color: #0044cc;
            text-decoration: none;
            font-size: 1.1rem;
        }

        /* Footer Styles */
        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        footer nav ul {
            list-style-type: none;
            margin: 10px 0;
        }

        footer nav ul li {
            display: inline;
            margin: 0 15px;
        }

        footer nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
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
                    <li><a href="events.php" class="active">Events</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content Section -->
    <section class="content">
        <!-- Left Side: Events to Register for -->
        <div class="events">
            <h2>Upcoming Alumni Events</h2>
            <p>Stay connected and engaged with your fellow alumni through a variety of exciting events! Below are our upcoming events:</p>

            <!-- Event 1 -->
            <div class="event">
                <h3>Annual Alumni Reunion 2025</h3>
                <p><strong>Date:</strong> April 5, 2025</p>
                <p><strong>Location:</strong> Seminar Hall, CSE block</p>
                <p>Join us for a day of fun, networking, and reminiscing! The reunion will feature speeches from distinguished alumni, a gala dinner, and opportunities to reconnect with old friends.</p>
                <button class="register-btn" onclick="registerForEvent('Annual Alumni Reunion 2025')">Register Now</button>
            </div>

            <!-- Event 2 -->
            <div class="event">
                <h3>Networking Event for Entrepreneurs</h3>
                <p><strong>Date:</strong> April 15, 2025</p>
                <p><strong>Location:</strong> Library</p>
                <p>Alumni entrepreneurs are invited to join a special networking event designed to foster collaboration, share insights, and promote new ventures. Don't miss the chance to expand your business network!</p>
                <button class="register-btn" onclick="registerForEvent('Networking Event for Entrepreneurs')">Register Now</button>
            </div>

            <!-- Event 3 -->
            <div class="event">
                <h3>Career Development Workshop</h3>
                <p><strong>Date:</strong> May 10, 2025</p>
                <p><strong>Location:</strong> Alumni Association Office</p>
                <p>Enhance your career prospects with our exclusive career development workshop. This event will feature resume building, interview tips, and mentorship from successful alumni.</p>
                <button class="register-btn" onclick="registerForEvent('Career Development Workshop')">Register Now</button>
            </div>
        </div>

        <!-- Right Side: Webinar Links by Domain -->
        <div class="webinar-links">
            <h2>Webinar Links for Different Domains</h2>
            <p>Click the domain name to access the Google Meet links for the guest lectures and webinars:</p>
            <ul>
                <li><strong>AI:</strong> <a href="https://meet.google.com/real-link-for-ai" target="_blank">Join AI Webinar</a></li>
                <li><strong>Machine Learning:</strong> <a href="https://meet.google.com/abc456" target="_blank">Join ML Webinar</a></li>
                <li><strong>Data Science:</strong> <a href="https://meet.google.com/def789" target="_blank">Join Data Science Webinar</a></li>
                <li><strong>Data Analytics:</strong> <a href="https://meet.google.com/ghi012" target="_blank">Join Data Analytics Webinar</a></li>
                <li><strong>Cybersecurity:</strong> <a href="https://meet.google.com/jkl345" target="_blank">Join Cybersecurity Webinar</a></li>
            </ul>
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
        // Load registered events from localStorage when the page loads
        document.addEventListener('DOMContentLoaded', function () {
            const storedEvents = JSON.parse(localStorage.getItem('registeredEvents')) || [];
            registeredEvents = storedEvents;
            updateRegisteredEventsList();
        });

        // Array to store registered events (this will be synced with localStorage)
        let registeredEvents = [];

        // Function to register for an event
        function registerForEvent(eventName) {
            // Check if the event is already registered
            if (!registeredEvents.includes(eventName)) {
                registeredEvents.push(eventName);
                localStorage.setItem('registeredEvents', JSON.stringify(registeredEvents)); // Save to localStorage
                alert(`You have successfully registered for the event: ${eventName}!`);
                updateRegisteredEventsList();
            } else {
                alert(`You are already registered for the event: ${eventName}`);
            }
        }

        // Function to update the list of registered events displayed on the page
        function updateRegisteredEventsList() {
            const registeredEventsList = document.getElementById('registered-events-list');
            registeredEventsList.innerHTML = ''; // Clear the existing list

            registeredEvents.forEach(event => {
                const listItem = document.createElement('li');
                listItem.textContent = event;
                registeredEventsList.appendChild(listItem);
            });
        }
    </script>
</body>

</html>
