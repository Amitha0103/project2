<?php
// Assuming a session has been started for user authentication
session_start();
// Check if user is logged in (session variable should be set)
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Example user data (Normally fetched from a database)
$user = [];

// Check user type and assign the appropriate data
if ($_SESSION['userType'] == 'student') {
    $user = [
        'name' => 'Anina',
        'designation' => 'Student',
        'graduation_year' => 2025,
        'course' => 'Computer Science',
        'bio' => 'Anina is a student in the present college pursuing her final year in the CSE department.',
        'email' => 'anina123@gmail.com',
        'phone' => '+91 7842640103',
        'linkedin' => 'https://linkedin.com/in/anina',
        'github' => 'https://github.com/anina',
        'profile_image' => "istockphoto.jpg",
        'achievements' => [
            'Developed a popular open-source project used by over 500 developers globally.',
            'Founded a coding bootcamp for underprivileged youth in her hometown.',
            'Speaker at multiple tech conferences, sharing her insights on software development.',
            'Volunteer at various alumni association events.'
        ]
    ];
} elseif ($_SESSION['userType'] == 'alumni') {
    $user = [
        'name' => 'RAM',
        'designation' => 'Alumni',
        'graduation_year' => 2019,
        'course' => 'Computer Science',
        'bio' => 'RAM is an alumnus of the college, now working as a Senior Software Engineer.',
        'email' => 'ram123@gmail.com',
        'phone' => '+91 9842567890',
        'linkedin' => 'https://linkedin.com/in/ram',
        'github' => 'https://github.com/ram',
        'profile_image' => "download.jpeg",
        'achievements' => [
            'Created an innovative tech product with 1M+ downloads.',
            'Guest speaker at numerous industry conferences.',
            'Mentor for several upcoming engineers.'
        ]
    ];
} elseif ($_SESSION['userType'] == 'admin') {
    $user = [
        'name' => 'Naina',
        'designation' => 'Admin',
        'graduation_year' => 2010,
        'course' => 'Management',
        'bio' => 'Admin user overseeing the Alumni platform and ensuring smooth operations.',
        'email' => 'admin@alumni.com',
        'phone' => '+91 9998887777',
        'linkedin' => 'https://linkedin.com/in/adminuser',
        'github' => 'https://github.com/adminuser',
        'profile_image' => "profile.jpg",
        'achievements' => [
            'Built a platform that connects thousands of alumni.',
            'Increased user engagement by 50% in the first year.',
            'Implemented multiple new features that improved the user experience.',
            'Coordinated with multiple organizations for internships and jobs.'
        ]
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Alumni Association</title>
    <style>
        /* Profile Page Styling */
        body {
            background: url('11.jpeg') no-repeat center center/cover;
            font-family: Arial, sans-serif;
            background-color: #f0f4f7; /* Page background color */
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #0044cc;
            padding: 20px 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            max-width: 1000px;
        }

        header h1 {
            color: white;
            text-align: center;
            margin: 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
        }

        nav ul li a:hover, nav ul li a.active {
            text-decoration: underline;
        }

        .profile {
            padding: 60px 0;
            background-color: #fff;
        }

        .profile-header {
            display: flex;
            gap: 30px;
            align-items: center;
            margin-bottom: 50px;
        }

        .profile-image img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #0044cc; /* Blue border around the image */
        }

        .profile-details {
            flex: 1;
        }

        .profile-details h2 {
            font-size: 2rem;
            color: #0044cc;
        }

        .profile-details p {
            font-size: 1rem;
            color: #555;
            margin: 5px 0;
        }

        .profile-achievements {
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border-radius: 8px;
        }

        .profile-achievements h3 {
            font-size: 1.5rem;
            color: #0044cc;
            margin-bottom: 20px;
        }

        .profile-achievements ul {
            list-style: none;
            padding-left: 0;
        }

        .profile-achievements ul li {
            font-size: 1rem;
            color: #555;
            margin-bottom: 10px;
        }

        .profile-contact {
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            border-radius: 8px;
        }

        .profile-contact h3 {
            font-size: 1.5rem;
            color: #0044cc;
            margin-bottom: 20px;
        }

        .profile-contact ul {
            list-style: none;
            padding-left: 0;
        }

        .profile-contact ul li {
            font-size: 1rem;
            color: #555;
            margin-bottom: 10px;
        }

        .profile-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .profile-buttons button {
            padding: 12px 25px;
            font-size: 1rem;
            background-color: #0044cc;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .profile-buttons button:hover {
            background-color: #0033aa;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 500px;
        }

        .close {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Chatbox Modal Close Button */
        .close-chatbox {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 28px;
            color: #aaa;
            cursor: pointer;
        }

        .chatbox-content {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .chatbox-content input {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Alumni Association</h1>
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="members.php">Members</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="profile.php" class="active">Profile</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Profile Section -->
    <section class="profile">
        <div class="container">
            <div class="profile-header">
                <div class="profile-image">
                    <img src="<?php echo $user['profile_image']; ?>" alt="Profile Image">
                </div>
                <div class="profile-details">
                    <h2><?php echo $user['name']; ?></h2>
                    <p class="designation"><?php echo $user['designation']; ?></p>
                    <p class="graduation-year">Graduation in <?php echo $user['graduation_year']; ?></p>
                    <p class="course">Course: <?php echo $user['course']; ?></p>
                    <p class="bio"><?php echo $user['bio']; ?></p>
                </div>
            </div>

            <div class="profile-achievements">
                <h3>Achievements & Contributions</h3>
                <ul>
                    <?php foreach ($user['achievements'] as $achievement): ?>
                        <li><?php echo $achievement; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="profile-contact">
                <h3>Contact Information</h3>
                <ul>
                    <li><strong>Email:</strong> <?php echo $user['email']; ?></li>
                    <li><strong>Phone:</strong> <?php echo $user['phone']; ?></li>
                    <li><strong>LinkedIn:</strong> <a href="<?php echo $user['linkedin']; ?>" target="_blank">LinkedIn Profile</a></li>
                    <li><strong>GitHub:</strong> <a href="<?php echo $user['github']; ?>" target="_blank">GitHub Profile</a></li>
                </ul>
            </div>

            <div class="profile-buttons">
                <button class="btn-edit-profile" onclick="editProfile()">Edit Profile</button>
            </div>
        </div>
    </section>

    <!-- Modal for Edit Profile -->
    <div id="editProfileModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditProfile()">&times;</span>
            <h3>Edit Profile</h3>
            <form id="editProfileForm">
                <label for="name">Name:</label>
                <input type="text" id="name" value="<?php echo $user['name']; ?>"><br>
                <label for="bio">Bio:</label>
                <textarea id="bio"><?php echo $user['bio']; ?></textarea><br>
                <label for="email">Email:</label>
                <input type="email" id="email" value="<?php echo $user['email']; ?>"><br>
                <button type="button" onclick="saveProfile()">Save Changes</button>
            </form>
        </div>
    </div>

    <script>
        // Open Edit Profile Modal
        function editProfile() {
            document.getElementById("editProfileModal").style.display = "block";
        }

        // Close Edit Profile Modal
        function closeEditProfile() {
            document.getElementById("editProfileModal").style.display = "none";
        }

        // Save Profile Changes (For now, just print out changes in the console)
        function saveProfile() {
            const name = document.getElementById("name").value;
            const bio = document.getElementById("bio").value;
            const email = document.getElementById("email").value;
            console.log("Profile updated:", { name, bio, email });

            // After saving, close the modal
            closeEditProfile();
        }
    </script>
</body>
</html>


