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
    <title>Alumni Association - Home</title>
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
            font-size: 0.9rem;
            text-transform: uppercase;
            padding: 0.5rem 1rem;
            transition: background 0.3s ease;
        }

        header nav ul li a:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 5px;
        }

        /* Hero Section */
        .hero {
            background: url('mvsr1.avif') no-repeat center center/cover;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .hero:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        .hero-content h1 {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 3rem;
            margin-bottom: 1rem;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .hero-content p {
            font-size: 1.5rem;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Showcase Grid Section */
        .showcase-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1rem;
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .grid-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .grid-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .grid-item:hover {
            transform: scale(1.05);
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 77, 64, 0.7);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            text-align: center;
            padding: 1rem;
            box-sizing: border-box;
        }

        .grid-item:hover .overlay {
            opacity: 1;
        }

        .overlay h2 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        .overlay p {
            font-size: 1.1rem;
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

        /* Chatbot Styling */
        .chatbot {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px;
            max-height: 400px;
            display: none; /* Initially hidden */
            flex-direction: column;
            z-index: 100;
        }

        .chat-box {
            overflow-y: auto;
            max-height: 350px;
            margin-bottom: 10px;
            padding-right: 10px;
        }

        .chat-input textarea {
            width: 100%;
            height: 50px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }

        .chat-input button {
            margin-top: 10px;
            padding: 10px;
            background-color: #004d40;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .chat-input button:hover {
            background-color: #00796b;
        }

        .message {
            margin-bottom: 10px;
        }

        .message strong {
            font-weight: bold;
        }

        .timestamp {
            font-size: 0.8rem;
            color: #777;
        }

        /* Chatbot Button */
        .chatbot-btn {
            position: fixed;
            bottom: 100px;
            right: 20px;
            padding: 15px 25px;
            background-color: #004d40;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
            display: block;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        .chatbot-btn:hover {
            background-color: #00796b;
        }

        /* Close Button */
        .close-chat {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
        }

        .close-chat:hover {
            background-color: #e53935;
        }

        /* Breaking News Styling */
        .breaking-news {
            text-align: center;
            margin-top: 50px;
            background-color: #ffeb3b;
            padding: 15px;
            font-size: 1.2rem;
            font-weight: bold;
            position: relative;
            overflow: hidden;
        }

        .breaking-news .news-links {
            display: flex;
            justify-content: space-around;
            white-space: nowrap;
            animation: scroll 20s linear infinite;
        }

        .breaking-news .news-item {
            margin: 0 20px;
            font-size: 1.2rem;
        }

        .breaking-news a {
            color: #004d40;
            font-weight: bold;
            text-decoration: none;
        }

        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
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
                <li><a href="mentorship.php">Mentorship</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="donation.php">Donations</a></li>
                <li><a href="jobportal.php">jobs</a></li>
                <li><a href="jobpostings.php">post jobs</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
		
            </ul>
        </nav>
    </header>

    <main id="home">
        <section class="hero">
            <div class="hero-content">
                <h1>Welcome to the Alumni Association</h1>
                <p>Celebrating the achievements and memories of our alumni.</p>
            </div>
        </section>

        <!-- Breaking News (Scrolling Tab) -->
        <section class="breaking-news">
            <div class="news-links">
                <div class="news-item"><a href="#">Hackathon Event - Register Now!</a></div>
                <div class="news-item"><a href="#">Abroad Guidance for Alumni</a></div>
                <div class="news-item"><a href="#">Upcoming Webinar on Career Growth</a></div>
                <div class="news-item"><a href="#">Annual Alumni Meet - Save the Date</a></div>
                <!-- Add more links as needed -->
            </div>
        </section>

        <section class="showcase-grid">
            <div class="grid-item">
                <img src="Untitled design.png" alt="Event 1">
                <div class="overlay">
                    <h2>Annual Alumni Meet</h2>
                    <p>Join us for the grand annual meet on March 15, 2025.</p>
                </div>
            </div>

            <div class="grid-item">
                <img src="mvsr2.jpeg" alt="Alumni Achievement 1">
                <div class="overlay">
                    <h2>Alumni Achievement</h2>
                    <p>Amith wins the Best Student of the Year award.</p>
                </div>
            </div>

            <div class="grid-item">
                <img src="webinar.jpg" alt="Webinar on Career Growth">
                <div class="overlay">
                    <h2>Webinar on Career Growth</h2>
                    <p>Exclusive webinar by industry leaders on April 22, 2025.</p>
                </div>
            </div>

            <div class="grid-item">
                <img src="mvsr3.jpeg" alt="Alumni Achievement 2">
                <div class="overlay">
                    <h2>Alumni Spotlight</h2>
                    <p>Susruth recognized for her contributions to technology.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Chatbot Button -->
    <button class="chatbot-btn" id="openChatBtn">Chat</button>

    <!-- Chatbot Window -->
    <div class="chatbot" id="chatbot">
        <button class="close-chat" id="closeChatBtn">X</button>
        <div class="chat-box" id="chatBox"></div>
        <div class="chat-input">
            <textarea id="messageInput" placeholder="Type your message..."></textarea>
            <button id="sendMessageBtn">Send</button>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Alumni Association. All rights reserved.</p>
    </footer>

    <script>
        // Chatbot functionality
        const openChatButton = document.getElementById('openChatBtn');
        const chatbot = document.getElementById('chatbot');
        const closeChatButton = document.getElementById('closeChatBtn');
        const sendMessageButton = document.getElementById('sendMessageBtn');
        const messageInput = document.getElementById('messageInput');
        const chatBox = document.getElementById('chatBox');

        let messages = JSON.parse(localStorage.getItem('chatMessages')) || [];

        function displayMessages() {
            chatBox.innerHTML = '';
            messages.forEach(message => {
                chatBox.innerHTML += `
                    <div class="message">
                        <strong>${message.username}</strong>: ${message.message} 
                        <span class="timestamp">${message.created_at}</span>
                    </div>
                `;
            });
        }

        openChatButton.addEventListener('click', function() {
            chatbot.style.display = 'flex';
            displayMessages();
        });

        closeChatButton.addEventListener('click', function() {
            chatbot.style.display = 'none';
        });

        sendMessageButton.addEventListener('click', function() {
            const message = messageInput.value.trim();
            if (message !== "") {
                const newMessage = { username: 'You', message: message, created_at: new Date().toISOString() };
                messages.push(newMessage);
                localStorage.setItem('chatMessages', JSON.stringify(messages)); // Save messages to localStorage
                messageInput.value = '';
                displayMessages();
            }
        });
    </script>
</body>

</html>
