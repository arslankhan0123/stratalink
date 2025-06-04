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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
            color: #343a40;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 25px;
        }

        /* --- Header Styles --- */
        header {
            background-color: rgba(33, 37, 41, 0.9);
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
            height: 50px;
            object-fit: cover;
        }

        .logo h1 {
            margin: 0;
            font-size: 2em;
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
        }

        header nav ul li:last-child {
            margin-right: 0;
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
        }

        .login-button {
            background-color: rgba(108, 117, 125, 0.7);
            color: #fff;
            border: 2px solid #fff;
            padding: 10px 22px;
            border-radius: 50px;
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

        /* Mobile Navigation Toggle */
        .menu-toggle {
            display: none; /* Hidden by default */
            font-size: 1.8em;
            color: #fff;
            cursor: pointer;
        }

        /* --- Hero Section Styles --- */
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url("{{ asset('images/landing2.jpeg') }}");
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            padding: 180px 20px 120px;
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
            margin-bottom: 25px;
            font-weight: 700;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.8);
            font-family: 'Montserrat', sans-serif;
        }

        .hero-content p {
            font-size: 1.8em;
            margin-bottom: 40px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.7);
            font-weight: 300;
        }

        .cta-button {
            background-color: #007bff;
            color: #fff;
            padding: 18px 40px;
            text-decoration: none;
            border-radius: 50px;
            font-size: 1.3em;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
            border: none;
            display: inline-block;
            font-family: 'Montserrat', sans-serif;
        }

        .cta-button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        /* --- Services Section Styles --- */
        .services-section {
            padding: 100px 0;
            background-color: #ffffff;
            position: relative;
            z-index: 3;
            margin-top: -80px;
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            box-shadow: 0 -10px 30px rgba(0, 0, 0, 0.08);
        }

        .services-section h2 {
            text-align: center;
            font-size: 3.2em;
            margin-bottom: 70px;
            color: #212529;
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
            border-radius: 2px;
        }

        .section-intro {
            text-align: center;
            font-size: 1.25em;
            color: #6c757d;
            margin-bottom: 60px;
            font-weight: 300;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }


        .service-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 35px;
        }

        .service-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            padding: 40px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e9ecef;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .service-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .service-card .icon-primary {
            font-size: 3.5em;
            color: #007bff;
            margin-bottom: 25px;
        }

        .service-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #212529;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }

        .service-card p {
            font-size: 1.05em;
            line-height: 1.7;
            color: #6c757d;
            margin-bottom: 30px;
            flex-grow: 1;
        }

        .learn-more-button {
            background-color: #28a745;
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
            transform: translateY(-2px);
        }

        /* --- About Us Section Styles --- */
        .about-section {
            padding: 100px 0;
            background-color: #f8f9fa;
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 60px;
        }

        .about-image {
            flex: 1;
            min-width: 400px;
        }

        .about-image img {
            max-width: 100%;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
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
            flex-wrap: wrap;
        }

        .contact-info {
            flex: 1;
            min-width: 300px;
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
            color: #e9ecef;
            padding-top: 60px;
            position: relative;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 40px;
            padding-bottom: 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-column h3 {
            color: #007bff;
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
            padding: 20px 0;
            text-align: center;
        }

        .footer-bottom p {
            margin: 0;
            font-size: 0.85em;
            color: #adb5bd;
        }

        /* --- Why Choose Us Section Styles --- */
        .why-choose-us-section {
            padding: 100px 0;
            background-color: #ffffff;
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
            border-radius: 2px;
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .benefit-item {
            background-color: #f8f9fa;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .benefit-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        }

        .benefit-item .icon-large {
            font-size: 3.5em;
            color: #007bff;
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
        }

        /* --- Responsive Design --- */

        /* Tablets and smaller desktops (992px) */
        @media (max-width: 992px) {
            .container {
                padding: 0 15px; /* Adjust padding for smaller screens */
            }

            /* Header */
            header .container {
                flex-direction: row; /* Keep logo and menu toggle on one line */
                justify-content: space-between;
                align-items: center;
            }

            header nav {
                display: none; /* Hide regular navigation */
                width: 100%;
                order: 2; /* Place below logo on mobile */
                background-color: rgba(33, 37, 41, 0.95); /* Slightly darker background when open */
                position: absolute;
                top: 80px; /* Adjust based on header height */
                left: 0;
                padding: 20px 0;
                box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
            }

            header nav.active {
                display: block; /* Show navigation when active */
            }

            header nav ul {
                flex-direction: column;
                text-align: center;
            }

            header nav ul li {
                margin: 15px 0; /* More vertical spacing */
            }

            .login-button {
                width: 80%; /* Make button wider on mobile menu */
                margin: 20px auto; /* Center it */
                display: block;
            }

            .menu-toggle {
                display: block; /* Show hamburger icon */
            }

            /* Hero Section */
            .hero-content h1 {
                font-size: 3.5em;
            }

            .hero-content p {
                font-size: 1.5em;
            }

            /* Services Section */
            .services-section h2 {
                font-size: 2.8em;
            }

            .service-cards {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Adjust min width */
            }

            /* About Section */
            .about-content {
                flex-direction: column;
                text-align: center;
                gap: 40px;
            }

            .about-image {
                min-width: unset; /* Remove min-width to allow shrinking */
                width: 100%;
            }

            .about-text h2 {
                text-align: center;
            }

            .about-text h2::after {
                left: 50%;
                transform: translateX(-50%);
            }

            .cta-button-secondary {
                margin-top: 20px;
            }

            /* Contact Section */
            .contact-grid {
                flex-direction: column;
                gap: 40px;
                align-items: stretch; /* Stretch items to fill width */
            }

            .contact-info,
            .contact-form {
                min-width: unset; /* Remove min-width */
                width: 100%;
            }

            /* Footer */
            .footer-grid {
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); /* Adjust min width for footer columns */
                gap: 30px;
            }
        }

        /* Mobile devices (768px and smaller) */
        @media (max-width: 768px) {
            /* Header */
            .logo h1 {
                font-size: 1.8em;
            }

            /* Hero Section */
            .hero-content h1 {
                font-size: 2.8em;
            }

            .hero-content p {
                font-size: 1.3em;
            }

            .cta-button {
                padding: 15px 30px;
                font-size: 1.1em;
            }

            /* Services Section */
            .services-section h2 {
                font-size: 2.2em;
                margin-bottom: 50px;
            }

            .service-cards {
                grid-template-columns: 1fr; /* Stack service cards */
            }

            .service-card {
                padding: 30px;
            }

            .service-card .icon-primary {
                font-size: 3em;
            }

            .service-card h3 {
                font-size: 22px;
            }

            /* Why Choose Us Section */
            .why-choose-us-section h2 {
                font-size: 2.5em;
            }

            .benefits-grid {
                grid-template-columns: 1fr; /* Stack on smaller screens */
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

            /* About Section */
            .about-text h2 {
                font-size: 2.5em;
            }

            .about-text p {
                font-size: 1em;
            }

            .cta-button-secondary {
                padding: 12px 25px;
                font-size: 1em;
            }

            /* Contact Section */
            .contact-section h2 {
                font-size: 2.5em;
            }

            .contact-intro {
                font-size: 1.1em;
                margin-bottom: 40px;
            }

            .contact-info,
            .contact-form {
                padding: 30px;
            }

            .contact-info h3 {
                font-size: 1.6em;
            }

            .contact-info p,
            .contact-form label,
            .contact-form input,
            .contact-form textarea {
                font-size: 0.95em;
            }

            .submit-button {
                padding: 12px 25px;
                font-size: 1em;
            }

            /* Footer */
            .footer-grid {
                grid-template-columns: 1fr; /* Stack footer columns */
                text-align: center;
                gap: 30px;
            }

            .social-icons {
                margin-top: 15px;
            }

            .social-icons a {
                margin: 0 10px; /* Adjust spacing for stacked social icons */
            }

            .contact-footer p {
                justify-content: center; /* Center icons and text */
            }
        }

        /* Smaller mobile devices (480px and smaller) */
        @media (max-width: 480px) {
            .container {
                padding: 0 10px;
            }

            .logo h1 {
                font-size: 1.5em;
            }

            .logo img {
                width: 40px;
                height: 40px;
            }

            .hero-section {
                padding: 120px 15px 80px;
            }

            .hero-content h1 {
                font-size: 2.2em;
            }

            .hero-content p {
                font-size: 1.1em;
            }

            .cta-button {
                padding: 12px 25px;
                font-size: 1em;
            }

            .services-section {
                padding: 80px 0;
                margin-top: -60px;
            }

            .services-section h2 {
                font-size: 1.8em;
                margin-bottom: 40px;
            }

            .section-intro {
                font-size: 1em;
                margin-bottom: 40px;
            }

            .service-card {
                padding: 25px;
            }

            .service-card .icon-primary {
                font-size: 2.5em;
            }

            .service-card h3 {
                font-size: 20px;
            }

            .service-card p {
                font-size: 0.95em;
            }

            .learn-more-button {
                padding: 10px 20px;
                font-size: 0.9em;
            }

            .why-choose-us-section {
                padding: 80px 0;
            }

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

            .benefit-item p {
                font-size: 0.9em;
            }


            .about-section {
                padding: 80px 0;
            }

            .about-text h2 {
                font-size: 2em;
            }

            .about-text p {
                font-size: 0.95em;
            }

            .contact-section {
                padding: 80px 0;
            }

            .contact-section h2 {
                font-size: 2em;
            }

            .contact-intro {
                font-size: 1em;
                margin-bottom: 30px;
            }

            .contact-info,
            .contact-form {
                padding: 25px;
            }

            .contact-info h3 {
                font-size: 1.4em;
            }

            .contact-info p,
            .contact-form label,
            .contact-form input,
            .contact-form textarea {
                font-size: 0.9em;
            }

            .submit-button {
                padding: 10px 20px;
                font-size: 0.9em;
            }

            footer {
                padding-top: 40px;
            }

            .footer-grid {
                gap: 20px;
            }

            .footer-column h3 {
                font-size: 1.2em;
                margin-bottom: 15px;
            }

            .footer-column p,
            .footer-column ul li a {
                font-size: 0.85em;
            }

            .social-icons a {
                font-size: 1.2em;
            }

            .footer-bottom p {
                font-size: 0.75em;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/strata.png') }}" alt="Company Logo">
                <h1>Strata Link</h1>
            </div>
            <nav id="main-nav">
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#why-choose-us">Why Choose Us</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="{{route('login')}}" class="login-button">Login</a></li>
                </ul>
            </nav>
            <div class="menu-toggle" id="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
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
                        <p><i class="fas fa-globe"></i> <a href="https://www.stratalink.com.au" target="_blank">www.stratalink.com.au</a></p>
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
                <p>At Strata Link, we specialize in managing after-hours calls for strata properties, ensuring seamless communication and prompt responses when it matters most.</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#why-choose-us">Why Choose Us</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-column contact-footer">
                <h3>Contact Info</h3>
                <p><i class="fas fa-envelope"></i> info@stratalink.com.au</p>
                <p><i class="fas fa-phone-alt"></i> (61) 451 125 816</p>
                <p><i class="fas fa-map-marker-alt"></i> Sydney, NSW, Australia</p>
            </div>
            <div class="footer-column newsletter">
                <h3>Newsletter</h3>
                <p>Stay updated with our latest news and offers.</p>
                <form action="#" method="POST">
                    <input type="email" placeholder="Your email" required style="width: calc(100% - 22px); padding: 10px; border-radius: 5px; border: 1px solid #ccc; margin-bottom: 10px;">
                    <button type="submit" class="submit-button" style="width: 100%; padding: 10px; font-size: 0.9em; border-radius: 5px;">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Strata Link. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('menu-toggle');
            const mainNav = document.getElementById('main-nav');

            if (menuToggle && mainNav) {
                menuToggle.addEventListener('click', function () {
                    mainNav.classList.toggle('active');
                });

                // Close menu when a navigation link is clicked
                mainNav.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', function() {
                        mainNav.classList.remove('active');
                    });
                });
            }
        });
    </script>
</body>

</html>