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

        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0" />
        <a href="https://www.flaticon.com/free-icons/observation" title="observation icons"></a>
        <script src="assets/js/script.js" defer></script>
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/chatbot.css">

        <title>wastemanagement®</title>
    </head>
    <body>

        <!--========== SCROLL TOP ==========-->
        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-chevron-up scrolltop__icon'></i>
        </a>

        <!--========== HEADER ==========-->
        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="dashbord.php" class="nav__logo">wastemanagement®</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="#home" class="nav__link">Home</a></li>
                        <li class="nav__item"><a href="login_about.php" class="nav__link">About</a></li>
                        <li class="nav__item"><a href="#contact" class="nav__link">Contact us</a></li>
                        <li class="nav__item"><a href="logout.php" class="nav__link">Sign out</a></li>
                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                      </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>
      
        <main class="l-main">


            
            <!--========== HOME ==========-->
            <section class="home" id="home">
                <div class="home__container bd-container bd-grid">
                    <div class="home__data">
                        <h2 class="home__subtitle">Reimagining a circular Economy</h2>
                        <h2 class="home__subtitle">Invest in our recycle<br>and waste solutions</h2>
                    
                    </div>
    
                    <img src="assets/img/3799978.png" alt="" class="home__img">
                </div>
            </section>
            

            <!--========== SERVICES ==========-->
            <section class="services section bd-container" id="services">
                <span class="section-subtitle">Waste management</span>
                <h2 class="section-title">Enhancing institutional as well as service delivery systems in urban local bodies for solid waste management</h2>

                <div class="services__container  bd-grid">
                    <div class="services__content">
                        <img src="assets/img/residential-waste.png" class="services__img">
                            
                        <h3 class="services__title">Residential waste pickup</h3>
                        <p class="services__description">wastemanagement curbside trash and recycling pickup is the best choice for your home,and for the environment.</p>
                    </div>

                    <div class="services__content">
                        <img src="assets/img/business-waste.png" class="services__img">
                         
                        <h3 class="services__title">Business waste pickup</h3>
                        <p class="services__description">Take cae of business, we'll take out the waste. Wastemanagement offers relaible, responsible business waste management.</p>
                    </div>

                    <div class="services__content">
                        <img src="assets/img/roll-off-dumpster.png" class="services__img">
                          
                        <h3 class="services__title">Roll-off Dumpstre</h3>
                        <p class="services__description">Form quick cleanouts to major renovations, wastemanagement has a dumpster that's perfect for your project.</p>
                    </div>
                </div>
            </section>

             <!--========== ABOUT ==========-->
             <section class="about section bd-container" id="about">
                <div class="about__container  bd-grid">
                    <img src="assets/img/robo G-1.png" alt="" class="about__img">
                    <div class="about__data">
                        <span class="section-subtitle about__initial">wastemanagement® </span>
                        <h2 class="section-title about__initial">RightAI®.</h2>
                        <p class="about__description">Wastemanagement® Cognitive Helpdesk Agent is an AI-based IT support engineer that works with your IT helpdesk team to provide 24/7 automated IT support activities. The Cognitive Helpdesk Agent leverages its well-trained IT knowledge and skills to understand requests from IT users and uses chatgpt 3.4Ai.</p>
                        <a href="#" class="button">WastemanagementAI</a>
                    </div>

                    
                </div>
            </section>

            <section class="about section bd-container" id="about">
                <div class="about__container  bd-grid">
                    <img src="assets/img/closeup-hands-separating-plastic-bottles.jpg" alt="" class="about__img">
                    <div class="about__data">
                    

                        <h2 class="section-title about__initial">Recycle Right®</h2>
                        <p class="about__description">Learn a few basics, stick to the system and spread the word. WM's Recycle Right® is the gold-standard program used by homes and businesses to make recycling simpler and more impactful.</p>
                        <a href="#" class="button">Recycle Right®</a>
                    </div>
                </div>
            </section>

            <!--========== CONTACT US ==========-->
            <section class="contact section bd-container" id="contact">
                <div class="contact__container bd-grid">
                    <div class="contact__data">
                        <span class="section-subtitle contact__initial">Let's talk</span>
                        <h2 class="section-title contact__initial">Have any questions?</h2>
                        <p class="contact__description">Schedule a free Q&A session with our AIOps transformation experts.</p>
                    </div>
                    <div class="contact__button">
                        <a href="#" class="button">Get Started</a><br>
</div>
                    
                </div>
                
            </section>
        </main>
        <button class="chatbot-toggler">
            <span class="material-symbols-rounded">mode_comment</span>
            <span class="material-symbols-outlined">close</span>
          </button>
          <div class="chatbot">
            <header>
              <h2>Chatbot</h2>
              <span class="close-btn material-symbols-outlined">close</span>
            </header>
            <ul class="chatbox">
              <li class="chat incoming">
                <span class="material-symbols-outlined">smart_toy</span>
                <p>hi, type help in chatbox to see commands</p>
              </li>
            </ul>
            <div class="chat-input">
              <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
              <span id="send-btn" class="material-symbols-rounded">send</span>
            </div>
          </div>
      
        <!--========== FOOTER ==========-->
        <footer class="footer section bd-container">
           

            <p class="footer__copy">&#169;wastemanagement 2023. All right reserved</p>
        </footer>

        <!--========== SCROLL REVEAL ==========-->
        <script src="https://unpkg.com/scrollreveal"></script>

        <!--========== MAIN JS ==========-->
        <script src="assets/js/main.js"></script>
    </body>
</html>