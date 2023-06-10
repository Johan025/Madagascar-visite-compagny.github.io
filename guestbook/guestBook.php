<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="guestBook.css">
    <link rel="stylesheet" href="../css/bootstrap_file/bootstrap.min.css">
  <script src="../css/bootstrap_file/jquery.min.js"></script>
  <script src="../css/bootstrap_file/bootstrap.min.js"></script>
</head>
<body>
  <?php

  ?>

 <?php
     $bd= new PDO('mysql:host=localhost;dbname=md_comment','root','');

     $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

     $requete=$bd -> prepare("SELECT * FROM md_comments");
 
     $requete->execute();

     $comments= $requete-> fetchAll();

    

     if (isset($_POST['send'])){
    
      var_dump($_GET['submit']); 
      $email=$_POST['email'];
      $name=$_POST['name'];
      $coms=$_POST['coms'];

    if (isset($email) && isset($name) && isset($coms)){
      $requete1=$bd ->prepare('INSERT INTO md_comments(comment_author,comment_author_email,comment_content) VALUES(:nom, :adresse_email, :coms)');
      $requete1->bindvalue(':nom', $name);
      $requete1->bindvalue(':adresse_email', $email);
     $requete1->bindvalue('coms', $coms);
     $requete1 ->execute();
    header("location:guestBook.php");
    }

    else {
      echo "case vide";
      echo" <script type=\"text/javascript\">alert ('Ce mail a déja été utilisé')</script>";
    }
    
    }
   ?> 
    <!-- barre de navigation  -->
 <header>
 
    <div class="header">
 
  <!-- <ul role="menu" class="hzmenu"> -->
    <ul>
      <li id="Home" class="Home"><a title="Home"  href="../index.html#">Home</a></li>
      <li id="tour" class="tour"><a title="tour" class="../index.html#t" href="#tours">Our tours</a></li>
      <li id="Contact" class="Contact"><a title="contact" class="c"  href="#footer" >Contact</a></li>
      <li id="Blog" class="Blog"><a title="Blog" href="#">Blog</a></li>
      <li id="Guest_Book" class="Guest_Book"><a   class="active" title="Guest_Book" class="g" href="#">Guest Book</a></li>
	  <li id="About_us" class="About_us"><a title="About_us"  class="a" href="#about">About us</a></li>
   
    
    <li class="versionAng" id="C"><img  class="imgAng" src="../logo/ang.jpg" alt=""> English <i class="fa fa-sort-desc" id="ang"></i></li>
</ul>
     <div class="fenetreFrancais" id="fenetreFrancais">
       <div class="item_1"><img  class="imgAng1" src="../logo/ang.jpg" alt=""><p> Francais</p></i></div>
     </div>
    </div>

    <div class="logoBurger"><i class="fa fa-bars"></i></div>
</header>
<img  class="logo" src="../logo/madagascar-visite-logo.png">

<!-- fin barre de navigation -->

<div class="guestBook">
     <h1>OUR GUEST BOOK</h1>
     <div class="border"></div>
<p class="recommandation">The recommandation of some clients about our compagny and about their travel and tour in MADAGASCAR</p>
<div class="comments">
   
    <?php
      foreach($comments as $value): ?>
       <ul>
       <li>
       <a target="_blank" class="a_com" href="<?= $value["comment_author_email"]?>"> " <?= $value["comment_author"]?></a>   <span><?= $value["comment_date"]?></span>

        <p><?= $value["comment_content"]?></p>
      </li>
      
       </ul>
    <?php endforeach; ?> 

</div>  

 <form action="" method="POST">
<div class="commentaire">
           <input type="email" placeholder="Entrez votre email" name="email" id="email">
           <input type="text"placeholder="Entrez votre nom" name="name" id="name">
           <textarea placeholder="Laissez votre commentaire" name="coms" id="coms">
      </textarea>

      <button type="submit" name="send" id="submit">Envoyer</button>
</div>
</form>
</div>

<footer id="footer">
          <div class="footer_contact">
            <h1>Contact us</h1>

            <p class="phone"> <img src="../logo/telephone20x20.png"   width=20 height=20> telephone: +261(0)34 73 440 45</p>
           <a href="lovasson@yahoo.fr"><p class="mail"><img src="../logo/lettre20x20.png"  width=20 height=20> email: lovasson@yahoo.fr</p></a>
            <p><i class="fa fa-whatsapp" width=20 height=20></i> WhatsApp:  +261(0)34 73 440 45</p>

             <div class="border_"></div>

            <div class="icones">
              <img src="../logo/twitter.png" width=48 height=48>
             <a href="https://web.facebook.com/madagascarvisite" class="img_fb" target="_blank"><img class="img_fb" src="../logo/FaceBook.png" width=48 height=48></a>
              <a href="https://www.linkedin.com" target="_blank"><img src="../logo/LinkedIn.png" width=48 height=48></a>
            </div>
</div>

<div class="footCopright">
  <center>
  Madagascar Visite 2023 - All right reserved - Politique de confidentialité - Mentions légales - Plan du site 
</center>
</div>
  </footer>
<script src="../index.js"></script>
</body>
</html>