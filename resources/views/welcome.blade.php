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

        /* Background Animation */
        @keyframes bgAnimation {
            0% { background: linear-gradient(45deg, #2196F3, #E91E63); }
            100% { background: linear-gradient(45deg, #E91E63, #2196F3); }
        }
       
            .header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 120px;
    background-color: transparent;
    
}

        .logo-title {
            display: flex;
            align-items: center;
        }
        .logo img {
            height: 60px;
            margin-right: 10px;
        }
        .title {
            font-size: 34px;
            font-weight: bold;
        }
        .login-button {
            padding: 10px 20px;
            background-color:rgb(15, 1, 1);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .login-button:hover {
            background-color: #0056b3;
        }
        .main-content {
    display: flex;
    width: 80%;
    max-width: 1200px;
    margin-top: 0px;
    align-items: center;
}

.left-image {
    flex: 1;
    text-align: start;
}

.left-image img {
    width: 100%;
    max-width: 500px;
    border-radius: 0px;
}

.right-text {
    flex: 1;
    padding: 20px;
    text-align: left; /* Centers the content horizontally */
    display: flex;
    flex-direction: column; /* Align text vertically */
    align-items: left; /* Centers text vertically */
}

.right-text h1 {
    font-size: 18px;
    color: #333;
}

.right-text p {
    font-size: 38px;
    color: White;
    line-height: 1.5;
}

.book-call-button {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px; /* Padding on top/bottom and left/right */
    background-color:rgb(0, 3, 7);
    color: white;
    font-size: 18px;
    text-decoration: none;
    border-radius: 5px;
    white-space: nowrap; /* Prevents text from wrapping */
    text-align: center;
}

.book-call-button:hover {
    background-color: #0056b3; /* Darker blue when hovering */
}

:root {
    --clr: rgb(36, 21, 16);
}
               /* About Section */
.about-section {
    width: 80%;
    max-width: 1200px;
    margin: 40px auto 10px auto; /* Adds a top margin of 40px */
    text-align: center;
    padding: 30px;
    background-color: var(--clr);
    border-radius: 0px;
}

        .about-section h2 {
        color: White;
    font-size: 32px;
    margin-bottom: 20px;
    padding-bottom: 5px; /* Adds some spacing between text and underline */
    border-bottom: 2px solid white; /* White underline */
    display: inline-block; /* Ensures underline width matches text */

          
        }
        .about-section p {
            font-size: 16px;
            color: white;
            line-height: 1.6;
            text-align: justify;
        }
        .expertise-section {
    display: flex;
    width: 80%;
    max-width: 1200px;
    margin: 50px auto;
}

.expertise-text {
    flex: 6; /* This takes 6 parts of the available space */
    background-color: var(--clr);
    padding: 30px;
    color: white;
    font-size: 18px;
}
.expertise-text h2 {
    font-size: 32px;
    margin-bottom: 20px;
    padding-bottom: 5px; /* Adds some spacing between text and underline */
    border-bottom: 2px solid white; /* White underline */
    display: inline-block; /* Ensures underline width matches text */
}
.expertise-image {
    flex: 4; /* This takes 4 parts of the available space */
    display: flex;
    align-items: center; /* Vertically center the image */
    justify-content: flex-end; /* Align the image to the right */
    background-color: #d0d0d0;
    padding-right: 0; /* Ensures no padding on the right */
}

.expertise-image img {
    width: 100%;
    max-width: 100%; /* Allow the image to fully expand */
    height: 100%; /* Ensure the image takes up the full container height */
    object-fit: cover; /* Ensure the image maintains its aspect ratio */
}

.why-choose-us {
    background-color:var(--clr);
    color: white;
    padding: 30px;
    width: 80%;
    max-width: 1200px;
    margin: 0px auto;
    border-radius: 0px;
    text-align: left;
}

.why-choose-us h2 {
    font-size: 32px;
    margin-bottom: 20px;
    padding-bottom: 5px; /* Adds some spacing between text and underline */
    border-bottom: 2px solid white; /* White underline */
    display: inline-block; /* Ensures underline width matches text */
}

.why-choose-us p {
    font-size: 18px;
    line-height: 1.6;
    margin-bottom: 15px;
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.contact-section {
    padding-top: 50px; /* Sets padding only on the top */
    display: flex;
    width: 80%;
    max-width: 1200px;
}

.contact-info {
    width: 50%; /* Ensures the contact info takes up 50% */
    height: 100%;
    background-color: var(--clr); /* Green Background */
    color: white;
    padding: 50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
}

.contact-info h2 {
    font-size: 32px;
    margin-bottom: 20px;
    padding-bottom: 5px; /* Adds some spacing between text and underline */
    border-bottom: 2px solid white; /* White underline */
    display: inline-block; /* Ensures underline width matches text */
}


.contact-info p {
    font-size: 15px;
    /* line-height: 1.6; */
    margin-bottom: 15px;
}

.contact-info a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}

.contact-info a:hover {
    text-decoration: underline;
}

/* Social Media Icons */
.social-icons a {
    color: white; /* Adjust for visibility */
    font-size: 24px;
    margin-right: 15px;
    text-decoration: none;
}

.social-icons a:hover {
    color: White; /* Change to your preferred hover color */
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