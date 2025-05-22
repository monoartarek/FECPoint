<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faridpur Engineering College Clubs</title>
    <link rel="stylesheet" href="responsive.css">
    <style>
        .fec-clubs-body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: #f4f4f4;
        }
        .fec-header {
            background: #333;
            color: white;
            padding: 15px 0;
        }
        .fec-nav ul {
            list-style: none;
            padding: 0;
        }
        .fec-nav ul li {
            display: inline;
            margin: 0 15px;
        }
        .fec-nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .fec-club-section {
            background: white;
            margin: 20px auto;
            padding: 20px;
            width: 80%;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .fec-club-section h2 {
            color: #333;
        }
        .fec-club-section a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background: #6f0b0b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

    </style>
</head>
<body class="fec-clubs-body">
    <!-- Include Header -->
    <?php include 'header.php'; ?>
    <header class="fec-header" style="padding-top:80px; display:flex; flex-direction:column">
        <h1>Faridpur Engineering College Clubs</h1>
        <nav class="fec-nav" style="padding-top:20px;padding-bottom:20px;">
            <ul>
                <li><a href="#programming">Programming Club</a></li>
                <li><a href="#software">Software Club</a></li>
                <li><a href="#ric">RIC</a></li>
                <li><a href="#photography">Photographic Club</a></li>
                <li><a href="#debate">Debate Club</a></li>
                <li><a href="#cultural">Cultural Club</a></li>
                <li><a href="#redcrescent">Red Crescent</a></li>
                <li><a href="#shopnoSharothi">Shopno Sharothi</a></li>
            </ul>
        </nav>
    </header>
    
    <section id="programming" class="fec-club-section">
        <h2>Programming Club</h2>
        <p>The Programming Club organizes coding contests, hackathons, and learning sessions.</p>
        <a href="#">Learn More</a>
    </section>
    
    <section id="software" class="fec-club-section">
        <h2>Software Club</h2>
        <p>Focuses on software development, projects, and real-world applications.</p>
        <a href="#">Learn More</a>
    </section>
    
    <section id="ric" class="fec-club-section">
        <h2>RIC</h2>
        <p>Robotics and Innovation Club (RIC) fosters technology and automation projects.</p>
        <a href="#">Learn More</a>
    </section>
    
    <section id="photography" class="fec-club-section">
        <h2>Photographic Club</h2>
        <p>For photography enthusiasts who capture moments beautifully.</p>
        <a href="#">Learn More</a>
    </section>
    
    <section id="debate" class="fec-club-section">
        <h2>Debate Club</h2>
        <p>Enhances public speaking and argumentation skills.</p>
        <a href="#">Learn More</a>
    </section>
    
    <section id="cultural" class="fec-club-section">
        <h2>Cultural Club</h2>
        <p>Organizes cultural programs, music, drama, and art events.</p>
        <a href="#">Learn More</a>
    </section>
    
    <section id="rover" class="fec-club-section">
        <h2>Rover Scout</h2>
        <p>Involves social service and outdoor adventure activities.</p>
        <a href="#">Learn More</a>
    </section>
    
    <section id="redcrescent" class="fec-club-section">
        <h2>Red Crescent</h2>
        <p>Works for humanity, providing emergency support and first aid training.</p>
        <a href="#">Learn More</a>
    </section>
    
    <section id="job" class="fec-club-section">
        <h2>Job Placement Club</h2>
        <p>Assists students with internships and job placements.</p>
        <a href="#">Learn More</a>
    </section>
    
    <section id="professional" class="fec-club-section">
        <h2>Professional Club</h2>
        <p>Prepares students for the corporate world with professional training.</p>
        <a href="#">Learn More</a>
    </section>
    

    
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const links = document.querySelectorAll(".fec-nav ul li a");
            links.forEach(link => {
                link.addEventListener("click", (e) => {
                    e.preventDefault();
                    const target = document.querySelector(link.getAttribute("href"));
                    if (target) {
                        target.scrollIntoView({ behavior: "smooth" });
                    }
                });
            });
        });
    </script>
</body>
</html>
