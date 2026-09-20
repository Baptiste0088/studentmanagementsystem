<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G S KIZIGURO TSS | Home</title>

    <!-- Bootstrap & Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

    <!-- Integrated CSS Stylesheet -->
    <style>
        /* Base Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        /* Header & Brand Layout */
        header {
            background: #004080;
            color: white;
            padding: 15px 30px;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Keeps brand on left, date/time on top right */
        }

        .brand-group {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 100px;
            height: 100px;
            margin-right: 20px;
            border-radius: 15px;
            object-fit: cover;
        }

        .school-name h1 {
            font-size: 32px;
            margin-left:300px;

        }

        .school-name p {
            margin-top: 5px;
            font-size: 16px;
            opacity: 0.9;
            margin-left:300px;
        }

        /* Top-Right Live Date & Time Container */
        .datetime-widget {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            padding: 8px 16px;
            border-radius: 8px;
            text-align: right;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            white-space: nowrap;
        }

        .datetime-widget .date-text {
            font-size: 14px;
            font-weight: 500;
            color: #e2e8f0;
            letter-spacing: 0.5px;
        }

        .datetime-widget .time-text {
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
            margin-top: 2px;
            font-family: 'Courier New', Courier, monospace; /* Clean tabbed spacing for clock */
        }

        /* Navigation Bar */
        nav {
            background: #0066cc;
            width: 100%;
        }

        nav > ul {
            list-style: none;
            display: flex;
            justify-content: center;
        }

        nav > ul > li {
            position: relative;
        }

        nav a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 16px 22px;
            font-size: 16px;
            font-weight: bold;
        }

        nav > ul > li > a:hover {
            background: #003366;
        }

        /* First Dropdown - Departments */
        nav ul li ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 210px;
            background: white;
            list-style: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.25);
            z-index: 1000;
        }

        nav ul li:hover > ul {
            display: block;
        }

        nav ul li ul li {
            position: relative;
            width: 100%;
        }

        nav ul li ul li a {
            color: #333;
            background: skyblue;
            padding: 10px 18px;
            white-space: nowrap;
            font-weight: normal;
        }

        nav ul li ul li a:hover {
            background: chocolate;
            color: #ffffff;
            border-radius: 4px;
        }

        /* Second Dropdown - TSS */
        nav ul li ul li ul {
            top: 0;
            left: 100%;
        }

        nav ul li ul li:hover > a {
            background: #e8f0fe;
            color: #1e3a8a;
        }

        /* Login Button */
        nav > ul > li > a.login {
            background: #16a34a;
            border-radius: 5px;
            margin-left: 20px;
        }

        nav > ul > li > a.login:hover {
            background: #15803d;
        }

        /* Hero Section */
        .hero {
            height: 450px;
            background: white
            color: black;
            display: flex;
            flex-direction: column;
            justify-content: left;
            align-items: left;
            text-align: center;
            padding: 30px;
        }

        .hero h2 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 25px;
            
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
        }

        /* Sections */
        section {
            padding: 50px 0;
        }

        section h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #004080;
        }

        /* Cards */
        .cards {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            background: white;
            width: 300px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,.2);
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card h3 {
            color: #0066cc;
            margin-bottom: 15px;
        }

        /* Footer */
        footer {
            background: #333333;
            color: white;
            text-align: center;
            padding: 30px;
            margin-top: 40px;
        }

        footer address {
            font-style: normal;
            margin-bottom: 15px;
        }

        footer a {
            color: #66b2ff;
            text-decoration: none;
        }

        /* Responsive Breakpoints */
        @media(max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .brand-group {
                flex-direction: column;
            }

            .logo {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .datetime-widget {
                text-align: center;
            }

            nav ul {
                flex-direction: column;
            }

            nav > ul > li > a.login {
                margin-left: 0;
            }

            .hero h2 {
                font-size: 30px;
            }

            .hero p {
                font-size: 16px;
            }

            .cards {
                flex-direction: column;
                align-items: center;
            }
            #now
            {
                background:yellow
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="brand-group">
                <img src="school_logo.jpg" alt="G S KIZIGURO TSS Logo" class="logo">
                <div class="school-name">
                    <h1>G S KIZIGURO TSS</h1>
                    <p>Excellence in Technical Secondary School</p>
                </div>
            </div>

            <!-- Top-Right Live Date & Time Display -->
            <div class="datetime-widget">
                <div class="date-text" id="live-date">Loading date...</div>
                <div class="time-text" id="live-time">00:00:00</div>
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Academics</a></li>
            <!-- Departments -->
            <li>
                <a href="#">Departments ▼</a>
                <!-- Departments Submenu -->
                <ul>
                    <li><a href="#">Nursery</a></li>
                    <li><a href="#">Lower Primary</a></li>
                    <li><a href="#">Upper Primary</a></li>
                    <li><a href="#">O'Level</a></li>
                    <!-- TSS -->
                    <li>
                        <a href="#">TSS ▶</a>
                        <!-- TSS Submenu -->
                        <ul>
                            <li><a href="#">CSA</a></li>
                            <li><a href="#">SOD</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">News & Events</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="login_form.php" class="login">Login</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="hero">
        <h2>Welcome to G S KIZIGURO TSS</h2>
        <p>
            Empowering students with quality education, technical skills,<br>
            innovation, discipline, and leadership for a brighter future.
            <a href="suggestion.php"><img src="box.jpg" alt="Suggestions" style="vertical-align: middle;"></a>
        </p>
        <h3 style="margin-bottom: 15px; font-size:20px; ">Apply For Admission Letter</h3> 
        <a href="admission_student.php" id="now" class="btn btn-success"><b>Apply Now</b></a>
    </section>

    <!-- Main Content -->
    <main class="container">

        <!-- About -->
        <section id="about">
            <h2>About Our School</h2>
            <p style="text-align: center;">
                G S KIZIGURO TSS is committed to providing quality secondary and
                technical education that prepares students for higher education,
                employment, and responsible citizenship.
            </p>
        </section>

        <!-- Vision -->
        <section id="vision">
            <h2>Our Vision</h2>
            <p style="text-align: center;">
                To become a leading technical secondary school recognized for
                academic excellence, innovation, and integrity.
            </p>
        </section>

        <!-- Mission -->
        <section id="mission">
            <h2>Our Mission</h2>
            <p style="text-align: center;">
                To equip learners with knowledge, technical skills, creativity,
                and values needed to succeed in a competitive global environment.
            </p>
        </section>

        <!-- Academic Programs -->
        <section id="academics">
            <h2>Academic Programs</h2>
            <div class="cards">
                <article class="card">
                    <h3>Ordinary Level (O-Level)</h3>
                    <p>Strong foundation in core secondary education subjects.</p>
                </article>
                <article class="card">
                    <h3>Technical Secondary School (TSS)</h3>
                    <p>
                        Practical and technical training in various professional
                        fields to prepare students for the job market.
                    </p>
                </article>
            </div>
        </section>

        <!-- Facilities -->
        <section id="facilities">
            <h2>Our Facilities</h2>
            <ul style="max-width: 400px; margin: auto; line-height: 1.8;">
                <li>Modern Classrooms</li>
                <li>Computer Laboratory</li>
                <li>Science Laboratories</li>
                <li>Technical Workshops</li>
                <li>Library</li>
                <li>Sports Grounds</li>
            </ul>
        </section>

        <!-- Student Life -->
        <section id="student-life">
            <h2>Student Life</h2>
            <ul style="max-width: 400px; margin: auto; line-height: 1.8;">
                <li>Sports and Games</li>
                <li>ICT Club</li>
                <li>Debate Club</li>
                <li>Music and Drama</li>
                <li>Environmental Club</li>
                <li>Community Service</li>
            </ul>
        </section>

        <!-- News -->
        <section id="news">
            <h2>Latest News & Events</h2>
            <div class="cards">
                <article class="card">
                    <h3>New Academic Year Begins</h3>
                    <p>Welcome to all new and returning students.</p>
                </article>
                <article class="card">
                    <h3>Technical Skills Exhibition</h3>
                    <p>
                        Students showcase innovative technical projects and practical skills.
                    </p>
                </article>
            </div>
        </section>

        <!-- Sidebar / Quick Links -->
        <aside style="text-align: center; padding: 20px 0;">
            <h2>Quick Links</h2>
            <ul style="list-style: none; padding: 0; line-height: 2;">
                <li><a href="#" style="color: #0066cc;">School Calendar</a></li>
                <li><a href="#" style="color: #0066cc;">Exam Results</a></li>
            </ul>
        </aside>

    </main>

    <!-- Footer -->
    <footer>
        <h2>Contact Us</h2>
        <address>
            <strong>G S KIZIGURO TSS</strong><br>
            Kiziguro Sector<br>
            Rwanda<br><br>
            Phone: +250783700478<br>
            Email: gskiziguro@gmail.com
        </address>

        <p style="margin-bottom: 15px;">
            Follow us on:
            <a href="#">Facebook</a> |
            <a href="#">Instagram</a> |
            <a href="#">X (Twitter)</a> |
            <a href="#">YouTube</a>
        </p>

        <p>&copy; 2026 G S KIZIGURO TSS. All Rights Reserved.</p>
    </footer>

    <!-- JavaScript to update Live Date and Time every second -->
    <script>
        function updateLiveClock() {
            const now = new Date();

            // Format Date (e.g., "Sunday, Aug 9, 2026")
            const dateOptions = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'short', 
                day: 'numeric' 
            };
            const formattedDate = now.toLocaleDateString('en-US', dateOptions);

            // Format Time (e.g., "02:45:12 PM")
            const timeOptions = { 
                hour: '2-digit', 
                minute: '2-digit', 
                second: '2-digit',
                hour12: true 
            };
            const formattedTime = now.toLocaleTimeString('en-US', timeOptions);

            document.getElementById('live-date').textContent = formattedDate;
            document.getElementById('live-time').textContent = formattedTime;
        }

        // Run immediately and update every 1 second (1000 ms)
        updateLiveClock();
        setInterval(updateLiveClock, 1000);
    </script>
</body>
</html>