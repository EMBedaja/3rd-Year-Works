<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMB Profile</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300&family=Merriweather:wght@300&family=Prompt&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<header>

    <div class="user">
        <img src="img/profile.JPG" alt="">
        <h3 class="name">Ella Marie Bedaja</h3>
        <p class="post">Web and Mobile Designer Student</p>
    </div>

    <nav class="navbar">
       
          <p><a href="#home"><span>Home</span></a></p>
          <p><a href="#about"><span>About</span></a></p>
          <p><a  href="#education"><span>Education</span></a></p>
           <p><a href="#portfolio"><span>Works</span></a></p>
           <p><a  href="#contact"><span>Contact</span></a></p>
       
    </nav>

</header>

<div id="menu" class="fas fa-bars"></div>

<div class="home" id="home">
    <img src="img/webdevelop.jpg" alt="background" width="1000px" height="570px" >
    <h1>Hi, I'm <span>Ella Marie</span></h1>
    <p> &nbsp; &nbsp; &nbsp; &nbsp;A college student at the University of St. La Salle, taking up the course of Bachelor of Science in Information Technology. Welcome to my Porftolio.
    </p>
</div>


<section class="about" id="about">

<h1 class="heading"> <span>About</span> me </h1>

<div class="row">
    <img src="img/profile2.jpg" alt="" >
    <div class="info">
        
        <h3> <span> Name : </span> Ella Marie B. Bedaja</h3>
        <h3> <span> Age : </span> 20 </h3>
        <h3> <span> Course : </span> Information Technology </h3>
        <h3> <span> Skills: </span> HTML, CSS, JavaScript, Visual design </h3>
        <h3> <span> Skills in technical expertise : </span> Graphics and design, User experience design</h3>
        <h3> <span> Projects Completed: </span> 6</h3>
        <p> "The first step is always the hardest, but once you take the first step, things will get easier from then on." </p>
    </div>

    </div>
    </section>
<section class="education" id="education">

<h1 class="heading"> My <span>Education</span> </h1>

<div class="box-container">

    <div class="box">
        <span>2021</span>
        <h3>TVL-CCS Graduate</h3>
        <p>I graduated with high honors from Senior High in the TVL Strand. This is when I learned how to use HTML and design.</p>
    </div>

    <div class="box">
        <span>2021</span>
        <h3>Logo Making Project</h3>
        <p>During our first semester, we focused on making logos. I have already made logos and some of them have been used for business. </p>
    </div>

    <div class="box">
        <span>2022</span>
        <h3>Prototype</h3>
        <p>Together with my group, we proposed a business proposal for a fitness consultation in one of our major classes. We made a prototype for our business layout online.</p>
    </div>

    <div class="box">
        <span>2022</span>
        <h3>Web Design Project</h3>
        <p>I created a Web Designer Portfolio for our Endterm Learning Evidence, and this portfolio is the outcome of my project. It's combining all the lessons to create this webpage.</p>
    </div>
</div>

</section>

<section class="portfolio" id="portfolio">

<h1 class="heading"> My <span>Works</span> </h1>

<div class="box-container">

    <div class="box">
     <a href="CLE1MT/index.html" target="_blank">
        <img src="img/CLE1.gif" alt=""></a>
    </div>

    <div class="box">
        <a href="LT2/HOME.html" target="_blank">
        <img src="img/LE2.gif" alt=""></a>
    </div>

    <div class="box">
        <a href="LT3/index.html" target="_blank">
            <img src="img/LE3.gif" alt=""> </a>
    </div>

    <div class="box">
        <a href="LT4/index.html" target="_blank">
            <img src="img/LE4.gif" alt=""></a>
    </div>

    <div class="box">
        <a href="LT5/index.html" target="_blank">
            <img src="img/LE5.gif" alt=""></a>
    </div>

</div>

</section>

<section class="contact" id="contact">

<h1 class="heading"> <span>Contact</span> me </h1>

<div class="row">

    <div class="content">

        <h3 class="title">Contact Details</h3>

        <div class="info">
            <h3> <i class="fas fa-envelope"></i> embedaja@gmail.com </h3>
            <h3> <i class="fas fa-phone"></i> 0966-921-7310 </h3>
            <h3> <i class="fas fa-phone"></i> 0910-237-3494 </h3>
        </div>
    </div>

    <form action="">

        <input type="text" placeholder="name" class="box">
        <input type="email" placeholder="email" class="box">
        <textarea name="" id="" cols="30" rows="10" class="box message" placeholder="message"></textarea>
        <button type="submit" class="btn"> Send Message </button>
    </form>
</div>
</section>
</body>
</html>