<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G S KIZIGURO TSS | Home</title>

    <!-- Bootstrap & Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="style.css" type="text/css">
    <!-- Integrated CSS Stylesheet -->
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
            <li>
  <a href="login_form.php" class="primary" style="background-color: rgb(4, 37, 12); color: white; border-radius:100px; line-height:70px;">
    Login
  </a>
</li>
<a href="signup.php" class="primary" style="background-color: rgb(9, 15, 204); color: white; border-radius:10px; line-height:70px;">
    Sign up
  </a>
</li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="hero">
        <h2>Welcome to G S KIZIGURO TSS</h2>
       <div style="display: flex; justify-content: space-between; align-items: center;">
    <div>
        Empowering students with quality education, technical skills,
        innovation, discipline, and leadership for a brighter future.
    </div>
    <a href="suggestion.php"> <img src="box.jpg" alt="Suggestions"> </a>
</div>
        <h3 style="margin-bottom: 15px; font-size: 30px; color: #2c3e50; font-family: Arial, sans-serif;">
  Apply For Admission Letter
</h3> 
<center>
<a href="admission_student.php" 
   class="apply_btn" 
   style="display:inline-block; width:300px; background-color:rgb(34, 7, 185); color: #ffffff; padding: 12px 28px; font-size: 20px; font-weight: bold; text-decoration: none; border-radius: 10px;">
  Apply Now
</a></center>
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
                    <h3>Pre-Primary(Nursary) </h3>
                    <p>Strong foundation in core primary education subjects.</p>
                </article>
                <article class="card">
                    <h3>Primary </h3>
                    <p>Strong foundation in core primary education subjects.</p>
                </article>
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