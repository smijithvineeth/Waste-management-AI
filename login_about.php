<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <a href="https://www.flaticon.com/free-icons/observation" title="observation icons"></a>
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/css/styles.css">
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />

        <link rel="stylesheet" href="assets/css/chatbot.css">

        <title>wastemanagement® about</title>
    </head>
    <body>

        <!--========== SCROLL TOP ==========-->
        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-chevron-up scrolltop__icon'></i>
        </a>

        <!--========== HEADER ==========-->
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="#" class="nav__logo">wastemanagement®</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="index.html" class="nav__link">Home</a></li>
                        <li class="nav__item"><a href="about.html" class="nav__link active-link">About</a></li>
                        <li class="nav__item"><a href="dashbord.php#services" class="nav__link">Products</a></li>
                        <li class="nav__item"><a href="logout.php" class="nav__link">Logout</a></li>

                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--========== Who we are ==========-->
            <section class="contact section bd-container" id="whoarewe">
                <div class="contact__container bd-grid">
                    <div class="contact__data">
                        <h1 class="section-title contact__initial">What is this project?</h1>
                        <p class="contact__des">This project is a chatbot for waste management assistance.</p>
                        <p class="contact__description">Users can interact with the chatbot by typing messages, and it responds to various commands and inquiries related to setting garbage pick-up schedules. The chatbot incorporates natural language processing from both OpenAI's GPT-3.5 Turbo model and Google's Dialogflow.</p>
                        <p class="contact__description">It can understand and respond to user messages, set schedule times, provide helpful information, and engage in predefined conversations. The user interface includes features like toggling the chatbox and handling user input for a seamless chatting experience.</p>
                    </div>
                    <img src="assets/img/about-us.png" alt="" class="home__img">
                </div>
            </section>

             

        <!--========== FOOTER ==========-->
        <footer class="footer section bd-container">
            <p class="footer__copy">&#169;wastemanagement® 2023. All right reserved</p>
        </footer>

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script src="assets/js/main.js"></script>
    </body>
</html>