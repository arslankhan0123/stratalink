<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Strata Link</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Body Styles */
        body {
            font-family: 'Roboto', sans-serif;
            /* A clean, modern sans-serif font */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
            /* Lighter background for a cleaner look */
            color: #343a40;
            /* Darker text for better readability */
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 25px;
            /* Slightly more padding for better spacing */
        }

        /* --- Header Styles --- */
        header {
            background-color: rgba(33, 37, 41, 0.9);
            /* Darker, sleek transparent header */
            color: #fff;
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            margin-right: 12px;
            border-radius: 50%;
            width: 50px;
            /* Larger logo */
            height: 50px;
            object-fit: cover;
        }

        .logo h1 {
            margin: 0;
            font-size: 2em;
            /* Slightly larger logo text */
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        header nav ul li {
            margin-right: 30px;
            /* More spacing between nav items */
        }

        header nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.05em;
            transition: color 0.3s ease;
            font-family: 'Montserrat', sans-serif;
        }

        header nav ul li a:hover {
            color: #66b3ff;
            /* Lighter blue on hover */
        }

        .login-button {
            background-color: rgba(108, 117, 125, 0.7);
            /* Muted gray for transparent look */
            color: #fff;
            border: 2px solid #fff;
            padding: 10px 22px;
            border-radius: 50px;
            /* More rounded button */
            cursor: pointer;
            font-size: 1em;
            font-weight: 600;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            font-family: 'Montserrat', sans-serif;
        }

        .login-button:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-color: #66b3ff;
            color: #fff;
        }

        /* --- Hero Section Styles --- */
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
            url("{{ asset('images/landing2.jpeg') }}");
            /* Gradient overlay + new image */
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 180px 20px 120px;
            /* More padding for a grander feel */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            top: 0;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 900px;
        }

        .hero-content h1 {
            font-size: 4.5em;
            /* Larger, bolder headline */
            margin-bottom: 25px;
            font-weight: 700;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8);
            font-family: 'Montserrat', sans-serif;
        }

        .hero-content p {
            font-size: 1.8em;
            /* Larger sub-headline */
            margin-bottom: 40px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
            font-weight: 300;
        }

        .cta-button {
            background-color: #007bff;
            /* Primary blue color */
            color: #fff;
            padding: 18px 40px;
            text-decoration: none;
            border-radius: 50px;
            /* Very rounded button */
            font-size: 1.3em;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
            border: none;
            display: inline-block;
            /* To allow padding/margin */
            font-family: 'Montserrat', sans-serif;
        }

        .cta-button:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
            transform: translateY(-3px);
        }

        /* --- Services Section Styles --- */
        .services-section {
            padding: 100px 0;
            /* More vertical padding */
            background-color: #ffffff;
            /* Solid white background */
            position: relative;
            z-index: 3;
            margin-top: -80px;
            /* Less overlap */
            border-top-left-radius: 30px;
            /* More rounded top corners */
            border-top-right-radius: 30px;
            box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.08);
            /* Softer, wider shadow */
        }

        .services-section h2 {
            text-align: center;
            font-size: 3.2em;
            /* Larger heading */
            margin-bottom: 70px;
            color: #212529;
            /* Darker black for headings */
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }

        .services-section h2::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: #007bff;
            /* Primary color underline */
            border-radius: 2px;
        }

        .service-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            /* Slightly wider min width */
            gap: 35px;
            /* More gap */
        }

        .service-card {
            background-color: #fff;
            border-radius: 15px;
            /* More rounded corners */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            /* Softer shadow */
            padding: 40px;
            /* More padding */
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e9ecef;
            /* Subtle border */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .service-card:hover {
            transform: translateY(-15px);
            /* More pronounced lift */
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            /* Stronger shadow on hover */
        }

        .service-card .icon-primary {
            font-size: 3.5em;
            /* Larger icons */
            color: #007bff;
            /* Primary blue icon color */
            margin-bottom: 25px;
        }

        .service-card h3 {
            font-size: 24px;
            /* Larger heading */
            margin-bottom: 15px;
            color: #212529;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }

        .service-card p {
            font-size: 1.05em;
            line-height: 1.7;
            color: #6c757d;
            /* Muted gray for body text */
            margin-bottom: 30px;
            flex-grow: 1;
            /* Allows text to grow and push button down */
        }

        .learn-more-button {
            background-color: #28a745;
            /* Green for secondary action */
            color: #fff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 50px;
            font-size: 0.95em;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
            border: none;
            font-family: 'Montserrat', sans-serif;
        }

        .learn-more-button:hover {
            background-color: #218838;
            /* Darker green on hover */
            transform: translateY(-2px);
        }

        /* --- About Us Section Styles --- */
        .about-section {
            padding: 100px 0;
            background-color: #f8f9fa;
            /* Light background for contrast */
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 60px;
            /* More space between image and text */
        }

        .about-image {
            flex: 1;
            min-width: 400px;
            /* Ensure image isn't too small */
        }

        .about-image img {
            max-width: 100%;
            border-radius: 15px;
            /* Rounded corners for image */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            /* Soft shadow */
        }

        .about-text {
            flex: 2;
        }

        .about-text h2 {
            font-size: 3.2em;
            color: #212529;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 15px;
        }

        .about-text h2::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 80px;
            height: 4px;
            background-color: #007bff;
            border-radius: 2px;
        }

        .about-text p {
            font-size: 1.1em;
            line-height: 1.8;
            color: #495057;
            margin-bottom: 20px;
        }

        .cta-button-secondary {
            background-color: #6c757d;
            /* Muted gray for secondary CTA */
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 50px;
            font-size: 1.1em;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
            border: none;
            font-family: 'Montserrat', sans-serif;
        }

        .cta-button-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-3px);
        }

        /* --- Contact Us Section Styles --- */
        .contact-section {
            padding: 100px 0;
            background-color: #e9ecef;
            /* Light gray background */
        }

        .contact-section h2 {
            text-align: center;
            font-size: 3.2em;
            margin-bottom: 20px;
            color: #212529;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }

        .contact-section h2::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: #007bff;
            border-radius: 2px;
        }

        .contact-intro {
            text-align: center;
            font-size: 1.25em;
            color: #6c757d;
            margin-bottom: 60px;
            font-weight: 300;
        }

        .contact-grid {
            display: flex;
            gap: 60px;
            align-items: flex-start;
            /* Align items to the top */
            flex-wrap: wrap;
            /* Allow wrapping on smaller screens */
        }

        .contact-info {
            flex: 1;
            min-width: 300px;
            /* Ensure info column has enough space */
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .contact-info h3 {
            font-size: 1.8em;
            color: #007bff;
            margin-bottom: 25px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }

        .contact-info p {
            font-size: 1.1em;
            color: #495057;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .contact-info p i {
            margin-right: 15px;
            color: #6c757d;
            font-size: 1.2em;
        }

        .contact-form {
            flex: 2;
            min-width: 400px;
            /* Ensure form column has enough space */
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .contact-form .form-group {
            margin-bottom: 25px;
        }

        .contact-form label {
            display: block;
            font-size: 1em;
            color: #495057;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            font-size: 1em;
            color: #495057;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .contact-form textarea {
            resize: vertical;
            /* Allow vertical resizing */
            min-height: 120px;
        }

        .submit-button {
            background-color: #007bff;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 50px;
            font-size: 1.1em;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
            font-family: 'Montserrat', sans-serif;
        }

        .submit-button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        /* --- Footer Styles --- */
        footer {
            background-color: #212529;
            /* Darker, solid footer */
            color: #e9ecef;
            padding-top: 60px;
            position: relative;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            /* 4 columns, responsive */
            gap: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-column h3 {
            color: #007bff;
            /* Primary color for footer headings */
            font-size: 1.3em;
            margin-bottom: 25px;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }

        .footer-column p {
            font-size: 0.95em;
            line-height: 1.7;
            margin-bottom: 15px;
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer-column ul li a {
            color: #adb5bd;
            /* Muted gray for links */
            text-decoration: none;
            font-size: 0.95em;
            transition: color 0.3s ease;
        }

        .footer-column ul li a:hover {
            color: #007bff;
        }

        .social-icons {
            margin-top: 20px;
        }

        .social-icons a {
            color: #fff;
            font-size: 1.4em;
            margin-right: 18px;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #007bff;
        }

        .contact-footer p {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .contact-footer p i {
            margin-right: 10px;
            font-size: 1.1em;
            color: #adb5bd;
        }


        .footer-bottom {
            background-color: #1a1d20;
            /* Slightly darker bottom footer */
            padding: 20px 0;
            text-align: center;
        }

        .footer-bottom p {
            margin: 0;
            font-size: 0.85em;
            color: #adb5bd;
        }

        /* --- Responsive Design --- */
        @media (max-width: 992px) {
            header .container {
                flex-direction: column;
                align-items: flex
            }
        }

        /* --- Why Choose Us Section Styles --- */
        .why-choose-us-section {
            padding: 100px 0;
            background-color: #ffffff;
            /* Consistent with services section background */
            text-align: center;
        }

        .why-choose-us-section h2 {
            font-size: 3.2em;
            margin-bottom: 70px;
            color: #212529;
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }

        .why-choose-us-section h2::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: #007bff;
            /* Primary color underline */
            border-radius: 2px;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            /* Responsive grid for benefits */
            gap: 40px;
            /* Space between benefit items */
        }

        .benefit-item {
            background-color: #f8f9fa;
            /* Light background for each item */
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            /* Soft shadow */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Center content within each item */
            text-align: center;
        }

        .benefit-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        .benefit-item .icon-large {
            font-size: 3.5em;
            /* Large icons */
            color: #007bff;
            /* Primary blue color for icons */
            margin-bottom: 25px;
        }

        .benefit-item h3 {
            font-size: 1.8em;
            color: #212529;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .benefit-item p {
            font-size: 1.05em;
            color: #6c757d;
            line-height: 1.7;
            flex-grow: 1;
            /* Allows text to grow and maintain consistent card height */
        }

        /* Responsive adjustments for "Why Choose Us" section */
        @media (max-width: 768px) {
            .why-choose-us-section h2 {
                font-size: 2.5em;
            }

            .benefits-grid {
                grid-template-columns: 1fr;
                /* Stack on smaller screens */
            }

            .benefit-item {
                padding: 30px;
            }

            .benefit-item .icon-large {
                font-size: 3em;
            }

            .benefit-item h3 {
                font-size: 1.6em;
            }
        }

        @media (max-width: 480px) {
            .why-choose-us-section h2 {
                font-size: 2em;
            }

            .benefit-item {
                padding: 25px;
            }

            .benefit-item .icon-large {
                font-size: 2.5em;
            }

            .benefit-item h3 {
                font-size: 1.4em;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/strata.png') }}" alt="Company Logo">
                <h1>Welcome to Strata Link</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="{{route('login')}}" class="login-button">Login</a></li>
                </ul>
                
            </nav>
        </div>
    </header>

    <main>
        <section id="hero" class="hero-section">
            <div class="hero-content">
                <h1>Innovate. Create. Succeed.</h1>
                <p>Empowering your vision with cutting-edge solutions and dedicated support.</p>
                <a href="#services" class="cta-button">Explore Our Solutions</a>
            </div>
        </section>

        <section id="services" class="services-section">
            <div class="container">
                <h2>Areas of Expertise: After-Hours Call Services</h2>
                <p class="section-intro">We provide comprehensive after-hours call management solutions tailored to the unique needs of strata properties. Whether it’s a late-night emergency or a simple inquiry, we ensure every call is handled professionally and with care.</p>
                <div class="service-cards">
                    <div class="service-card">
                        <i class="fas fa-headset icon-primary"></i>
                        <h3>Emergency Call Handling</h3>
                        <p>Our expert team is ready 24/7 to manage critical after-hours emergencies, ensuring prompt and appropriate responses when it matters most.</p>
                        <a href="#about" class="learn-more-button">Learn More</a>
                    </div>
                    <div class="service-card">
                        <i class="fas fa-tools icon-primary"></i>
                        <h3>Maintenance Requests</h3>
                        <p>We efficiently log and dispatch all maintenance requests, ensuring properties are well-maintained even outside standard business hours.</p>
                        <a href="#about" class="learn-more-button">Learn More</a>
                    </div>
                    <div class="service-card">
                        <i class="fas fa-users-cog icon-primary"></i>
                        <h3>Resident Support</h3>
                        <p>Providing courteous and effective support to residents for all their after-hours inquiries and concerns, enhancing satisfaction.</p>
                        <a href="#about" class="learn-more-button">Learn More</a>
                    </div>
                    <div class="service-card">
                        <i class="fas fa-file-alt icon-primary"></i>
                        <h3>Incident Reporting</h3>
                        <p>Accurate and timely reporting of all incidents, providing clear and detailed records for strata and building managers.</p>
                        <a href="#about" class="learn-more-button">Learn More</a>
                    </div>
                    <div class="service-card">
                        <i class="fas fa-user-friends icon-primary"></i>
                        <h3>Contractor Engagement & Follow-Up</h3>
                        <p>Seamless coordination with trusted contractors, from initial engagement to on-site arrival and follow-up, for efficient problem resolution.</p>
                        <a href="#about" class="learn-more-button">Learn More</a>
                    </div>
                    <div class="service-card">
                        <i class="fas fa-chart-bar icon-primary"></i>
                        <h3>Monthly Detailed Reporting</h3>
                        <p>Receive comprehensive monthly reports with detailed call logs, resolution times, and other key metrics for full transparency.</p>
                        <a href="#about" class="learn-more-button">Learn More</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="why-choose-us" class="why-choose-us-section">
            <div class="container">
                <h2>Why Choose Us?</h2>
                <div class="benefits-grid">
                    <div class="benefit-item">
                        <i class="fas fa-user-tie icon-large"></i>
                        <h3>Expertly Trained Operators Ready for Any Situation</h3>
                        <p>Our call centre operators are trained by professionals who work in the strata industry every day. They understand what constitutes a strata emergency, from water leaks to building safety issues, and are equipped to handle even the most complex situations with confidence and efficiency.</p>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-clipboard-list icon-large"></i>
                        <h3>Clear, Detailed Reporting Every Step of the Way</h3>
                        <p>With our service, you’ll always have a clear record of what happened and when. We provide comprehensive call recordings and meticulously logged cases that are easy to follow. No more confusion or missed details—just straightforward, reliable information at your fingertips.</p>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-bell icon-large"></i>
                        <h3>Instant Alerts to Keep You in the Loop</h3>
                        <p>We don’t just handle emergencies; we keep you informed. Our system sends instant prompts to strata and building managers via email, alerting them to any emergency situations. Whether it’s a plumbing disaster or a security issue, you’ll be in the know—right when you need to be.</p>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-hard-hat icon-large"></i>
                        <h3>Full Contractor Management</h3>
                        <p>From initial engagement to the contractor’s arrival on site, we manage it all. Our team coordinates with trusted contractors to ensure prompt action is taken, providing a seamless experience from start to finish. No more scrambling to find the right person for the job when every minute counts.</p>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-laptop-code icon-large"></i>
                        <h3>Proprietary Software Built for Strata Needs</h3>
                        <p>All your strata plans and emergency contacts are safely stored and managed in our proprietary software, designed specifically for strata emergency assistance. This system ensures your property details are always accessible, accurate, and easy to reference during critical moments.</p>
                    </div>
                    <div class="benefit-item">
                        <i class="fas fa-handshake icon-large"></i>
                        <h3>Hassle-Free Onboarding & Support</h3>
                        <p>Starting or transferring over is a breeze with our client onboarding process. We ensure that everything is set up quickly and efficiently, saving your team valuable time. You’ll be supported every step of the way as we integrate seamlessly into your operations.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="about-section">
            <div class="container">
                <div class="about-content">
                    <div class="about-image">
                        <img src="{{ asset('images/landing1.jpg') }}" alt="About Us Team">
                    </div>
                    <div class="about-text">
                        <h2>About Our Company</h2>
                        <p>At Strata Link, we specialize in managing after-hours calls for strata properties, ensuring seamless communication and prompt responses when it matters most. Our dedicated team is available 24/7 to handle urgent maintenance requests, resident inquiries, and emergency situations, providing peace of mind to property managers, owners, and tenants. With years of experience in strata communication, we prioritize efficiency, professionalism, and reliability in every interaction.</p>
                        <a href="#services" class="cta-button-secondary">Learn More About Us</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="contact-section">
            <div class="container">
                <h2>Get in Touch</h2>
                <p class="contact-intro">Have a project in mind or just want to say hello? Reach out to us!</p>
                <div class="contact-grid">
                    <div class="contact-info">
                        <h3>Our Website</h3>
                        <p><i class="fas fa-map-marker-alt"></i> <a href="https://www.stratalink.com.au" target="_blank">www.stratalink.com.au</a></p>
                        <h3>Email Us</h3>
                        <p><i class="fas fa-envelope"></i> info@stratalink.com.au</p>
                        <h3>Call Us</h3>
                        <p><i class="fas fa-phone-alt"></i> (61) 451 125 816</p>
                    </div>
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="submit-button">Send Message</button>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container footer-grid">
            <div class="footer-column about-company">
                <h3>About Us</h3>
                <p>At Strata Link, we specialize in managing after-hours calls for strata properties, ensuring seamless communication and prompt responses when it matters most. Our dedicated team is available 24/7 to handle urgent maintenance requests, resident inquiries, and emergency situations, providing peace of mind to property managers, owners, and tenants. With years of experience in strata communication, we prioritize efficiency, professionalism, and reliability in every interaction.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-column quick-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
            <div class="footer-column services-links">
                <h3>Our Services</h3>
                <ul>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Mobile App Development</a></li>
                    <li><a href="#">Cloud Solutions</a></li>
                    <li><a href="#">Digital Marketing</a></li>
                    <li><a href="#">IT Consulting</a></li>
                    <li><a href="#">Cybersecurity</a></li>
                </ul>
            </div>
            <div class="footer-column contact-footer">
                <h3>Contact Info</h3>
                <p><i class="fas fa-map-marker-alt"></i> <a href="https://www.stratalink.com.au" target="_blank">www.stratalink.com.au</a></p>
                <p><i class="fas fa-phone-alt"></i> (61) 451 125 816</p>
                <p><i class="fas fa-envelope"></i> info@stratalink.com.au</p>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; 2025 Your Company Name. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>