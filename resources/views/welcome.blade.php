<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Strata Link</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
    body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: linear-gradient(45deg, #2196F3, #E91E63);
            color: #fff;
            animation: bgAnimation 10s infinite alternate;
        }

        @keyframes bgAnimation {
            0% { background: linear-gradient(45deg, #2196F3, #E91E63); }
            100% { background: linear-gradient(45deg, #E91E63, #2196F3); }
        }

        .header {
            width: 88%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background-color: transparent;
        }

        .logo img {
            height: 50px;
            margin-right: 10px;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
        }

        .login-button {
            font-size: 16px;
            background-color: white;
            color: black;
            border: 2px solid black;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s, color 0.3s;
            margin-top: 20px;

        }

        .main-content {
            display: flex;
            flex-wrap: wrap;
            width: 90%;
            max-width: 1200px;
            margin-top: 20px;
            align-items: center;
        }

        .left-image, .right-text {
            flex: 1;
            text-align: start;
            margin-bottom: 20px;
        }

        .left-image img {
            width: 100%;
            max-width: 400px;
        }

        .right-text h1 {
            font-size: 16px;
            
        }

        .right-text p {
            font-size: 28px;
        }

        .book-call-button {
            font-size: 16px;
            background-color: white;
            color: black;
            border: 2px solid black;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            transition: background 0.3s, color 0.3s;
        }

        h2 {
            border-bottom: 2px solid white;
            display: inline-block;
            padding-bottom: 5px;
        }
        .about-section, .expertise-section, .why-choose-us, .contact-section {
            width: 90%;
            max-width: 1200px;
           
    margin-bottom: 20px;
            text-align: center;
            background-color:rgb(14, 1, 1);        }

        .expertise-section, .contact-section {
            display: flex;
            flex-wrap: wrap;
        }

        .expertise-text, .expertise-image, .contact-info {
            flex: 1;
            min-width: 300px;
            padding: 20px;
        }

        .expertise-image img {
            width: 100%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                padding: 15px;
                text-align: center;
            }

            .main-content {
                flex-direction: column;
                text-align: center;
            }

            .left-image img {
                max-width: 300px;
            }

            .right-text p {
                font-size: 24px;
            }

            .about-section, .why-choose-us {
                text-align: center;
            }

            .expertise-section, .contact-section {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <header class="header">
        <div class="logo-title">
            <div class="logo">
                <img src="{{ asset('images/strata.png') }}" alt="Logo">
            </div>
            <div class="title">Welcome to Strata Link</div>
        </div>
        
        @if(Route::has('login'))
            <a href="{{ route('login') }}" class="login-button">Login</a>
        @else
            <a href="#" class="login-button">Login</a>
        @endif
    </header>

    <div class="main-content">
        <div class="left-image">
            <img src="{{ asset('images/landing1.jpg') }}" alt="Strata Link Image">
        </div>
        <div class="right-text">
            <h1>Strata Link</h1>
            <p>After-Hours Emergency <br> Support: Your Partner in <br> Crisis Management</p>
            <a href="#" class="book-call-button" onclick="scrollToBottom()">Book a Call</a>
        </div>
    </div>
    
      <!-- About Section -->
      <div class="about-section">
        <h2>ABOUT OUR FIRM</h2>
        <p>
            At Strata Link, we specialize in managing after-hours calls for strata properties, ensuring 
            seamless communication and prompt responses when it matters most. Our dedicated team is 
            available 24/7 to handle urgent maintenance requests, resident inquiries, and emergency 
            situations, providing peace of mind to property managers, owners, and tenants. With years of 
            experience in strata communication, we prioritize efficiency, professionalism, and reliability in 
            every interaction.
        </p>
    </div>
    <div class="expertise-section">
        <div class="expertise-text">
            <h2>Areas of Expertise</h2>
            <p>
                We provide comprehensive after-hours call management solutions tailored to the unique needs of strata properties. Our services include:
            </p>
            <div style="height: 20px;"></div>
       
            
            <ul style="padding-left: 20px;">
    <li>Emergency Call Handling</li>
    <li>Maintenance Requests</li>
    <li>Resident Support</li>
    <li>Incident Reporting</li>
    <li>Engaging and Following Up with Contractors</li>
    <li>Monthly Detailed Reporting</li>
</ul>
<div style="height: 20px;"></div>
<h3>AFTER-HOURS CALL SERVICES</h3>
            <div style="height: 20px;"></div>
            <h6>
                WHETHER IT’S A LATE-NIGHT EMERGENCY OR A SIMPLE INQUIRY, WE ENSURE EVERY CALL IS HANDLED PROFESSIONALLY AND WITH CARE.
</h6>
        </div>
        <div class="expertise-image">
            <img src="{{ asset('images/landing2.jpeg') }}" alt="Expertise Image">
        </div>
    </div>
    <div class="why-choose-us">
    <h2>Why Choose Us?</h2>
    <p><strong>1. Expertly Trained Operators Ready for Any Situation</strong><br>
        Our call centre operators are trained by professionals who work in the strata industry every day. They understand what
        constitutes a strata emergency, from water leaks to building safety issues, and are equipped to handle even the most
        complex situations with confidence and efficiency.
    </p>
    <p><strong>2. Clear, Detailed Reporting Every Step of the Way</strong><br>
        With our service, you’ll always have a clear record of what happened and when. We provide comprehensive call
        recordings and meticulously logged cases that are easy to follow. No more confusion or missed details—just
        straightforward, reliable information at your fingertips.
    </p>
    <p><strong>3. Instant Alerts to Keep You in the Loop</strong><br>
        We don’t just handle emergencies; we keep you informed. Our system sends instant prompts to strata and building
        managers via email, alerting them to any emergency situations. Whether it’s a plumbing disaster or a security issue,
        you’ll be in the know—right when you need to be.
    </p>
    <p><strong>4. Full Contractor Management</strong><br>
        From initial engagement to the contractor’s arrival on site, we manage it all. Our team coordinates with trusted
        contractors to ensure prompt action is taken, providing a seamless experience from start to finish. No more scrambling
        to find the right person for the job when every minute counts.
    </p>
    <p><strong>5. Proprietary Software Built for Strata Needs</strong><br>
        All your strata plans and emergency contacts are safely stored and managed in our proprietary software, designed
        specifically for strata emergency assistance. This system ensures your property details are always accessible,
        accurate, and easy to reference during critical moments.
    </p>
    <p><strong>6. Hassle-Free Onboarding & Support</strong><br>
        Starting or transferring over is a breeze with our client onboarding process. We ensure that everything is set up quickly
        and efficiently, saving your team valuable time. You’ll be supported every step of the way as we integrate seamlessly
        into your operations.
    </p>
</div> 
<div class="expertise-section">
<div class="contact-info">
    <h2>REACH OUT TODAY</h2>
    <p><strong>PHONE</strong><br> (61) 451 125 816</p>
    <p><strong>Email</strong><br> services@startalink.com.au</p>
    <p><strong>Website</strong><br> 
        <a href="https://www.stratalink.com.au" target="_blank">www.stratalink.com.au</a>
    </p>
    
    <p><strong>Social-Media</strong>
    <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
</div>
<div class="expertise-image">
    <img src="{{ asset('images/landing3.jpg') }}" alt="Expertise Image">
</div>
<script>
    function scrollToBottom() {
        // Get the height of the document's body
        const scrollHeight = document.body.scrollHeight;
        
        // Use window.scrollTo to scroll to the bottom
        window.scrollTo({
            top: scrollHeight,
            behavior: 'smooth' // Smooth scroll effect
        });
    }
</script>

</body>
</html>