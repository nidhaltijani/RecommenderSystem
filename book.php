<?php
require_once 'dbh.php';
$id=$_GET['id'];
$sql="SELECT * from produit where idPdt ='".$id."'";
 $res=mysqli_query($conn,$sql);

 $row=mysqli_fetch_assoc($res);
 $top1="select * from produit where idPdt='".$row['top1']."'";
 $top2="select * from produit where idPdt='".$row['top2']."'";
 $top3="select * from produit where idPdt='".$row['top3']."'";
 $res1=mysqli_query($conn,$top1);
 $res2=mysqli_query($conn,$top2);
 $res3=mysqli_query($conn,$top3);
 $row1=mysqli_fetch_assoc($res1);
 $row2=mysqli_fetch_assoc($res2);
 $row3=mysqli_fetch_assoc($res3);

 
?>

<!DOCTYPE html>
<html>
<head>
  <title><?php $row['nomPdt'] ?></title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:400,500,600%7CTeko:300,400,500%7CMaven+Pro:500">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="style.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.3.1/css/all.css'>
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>

   <style>
      
      :root {
  --main-color: #2196f3;
  --main-color-alt: #1787e0;
  --main-transition: 0.3s;
  --main-padding-top: 100px;
  --main-padding-bottom: 100px;
  --section-background: #ececec;
}
*{
  scroll-behavior: smooth;
}
.testimonials {
  padding-top: var(--main-padding-top);
  padding-bottom: var(--main-padding-bottom);
  position: relative;
  background-color: var(--section-background);
}
.testimonials .container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 40px;

}
.testimonials .box {
  padding: 20px;
  background-color: white;
  box-shadow: 0 2px 4px rgb(0 0 0 / 7%);
  border-radius: 6px;
  position: relative;
}
.testimonials .box img {
  position: absolute;
  right: -10px;
  top: -50px;
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: 10px solid var(--section-background);
}
.testimonials .box h3 {
  margin: 0 0 10px;
}
.testimonials .box .title {
  color: #777;
  margin-bottom: 10px;
  display: block;
}
.testimonials .box .rate .filled {
  color: #ffc107;
}
.testimonials .box p {
  line-height: 1.5;
  color: #777;
  margin-top: 10px;
  margin-bottom: 0;
}


    </style>
    <style>
      
      .chartsBx{
  position: relative;
  width: 100%;
  padding: 20px;
  display: grid;
  grid-template-columns: 1fr 2fr;
  grid-gap: 30px;
}

.chartsBx .chart{
  position: relative;
  background: #fff;
  padding: 20px;
  width: 100%;
  box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
  border-radius: 20px;
  border: 1px solid var(--blue);
}
.main-title {
  text-transform: uppercase;
  margin: 0 auto 80px;
  border: 2px solid black;
  padding: 10px 20px;
  font-size: 30px;
  width: fit-content;
  position: relative;
  z-index: 1;
  transition: var(--main-transition);
}
.main-title::before,
.main-title::after {
  content: "";
  width: 12px;
  height: 12px;
  background-color: var(--main-color);
  position: absolute;
  border-radius: 50%;
  top: 50%;
  transform: translateY(-50%);
}
.main-title::before {
  left: -30px;
}
.main-title::after {
  right: -30px;
}
.main-title:hover::before {
  z-index: -1;
  animation: left-move 0.5s linear forwards;
}
.main-title:hover::after {
  z-index: -1;
  animation: right-move 0.5s linear forwards;
}
.main-title:hover {
  color: var(--main-color);
  border: 2px solid white;
  transition-delay: 0.5s;
}

/*pop up style*/
/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;

}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;} 
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
    </style>
</head>
<body>

<section class="section section-sm section-first bg-default text-center" id="services">
        <div class="container">
          <div class="row row-30 justify-content-center">
            
            <div class="col-md-7 col-lg-5 col-xl-6 text-lg-left wow fadeInUp"><img src="product_imgs/<?php echo $row['idPdt']; ?>.jpg" alt="" width="700" height="700"/>
              <p><strong>Description : </strong><?php echo $row['Description']; ?></p>
            </div>
            <div class="col-lg-7 col-xl-6">
              <div class="row row-30">
                <div class="col-sm-6 wow fadeInRight">
                  <article class="box-icon-modern box-icon-modern-custom">
                    <div>
                      <h3 class="box-icon-modern-big-title"><?php echo $row['nomPdt']; ?></h3>
                      <div class="box-icon-modern-decor"></div><a class="button button-primary button-ujarak" href="#comments"><?php echo $row['auteur']; ?></a>
                    </div>
                  </article>
                </div>
                <div class="col-sm-6 wow fadeInRight" data-wow-delay=".1s">
                  <article class="box-icon-modern box-icon-modern-2">
                    <div class="box-icon-modern-icon linearicons-user"></div>
                    <h5 class="box-icon-modern-title"><a href="#" >Livre</a></h5>
                    
                    
                  </article>
                </div>
                <div class="col-sm-6 wow fadeInRight" data-wow-delay=".2s">
                  <article class="box-icon-modern box-icon-modern-2">
                    <div class="box-icon-modern-icon linearicons-list"></div>
                    <h5 class="box-icon-modern-title"><a href="#">Catégorie</a></h5>
                    <div class="box-icon-modern-decor"></div>
                    <p class="box-icon-modern-text"></p>
                  </article>
                </div>
                <div class="col-sm-6 wow fadeInRight" data-wow-delay=".3s">
                  <article class="box-icon-modern box-icon-modern-2">
                   <div class="chart"> <canvas id="chart-1"></canvas> </div>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="comments">
            
        </div>
      </section>

<!-- comments on this peti-->
      <section>
        <div class="testimonials" id="testimonials">
      
      <div class="container">
         
   <h2 class="main-title">Des livres similaires</h2>

        <div class="box">
          <!--<img src="avatar1.png" alt="" />-->
          <img src="product_imgs/<?php echo $row1['idPdt'] ?>.jpg" height="300" width="300">
          <h3><?php echo $row1['nomPdt']; ?></h3>
          <span class="title"><?php echo $row1['auteur']; ?></span>
         
          
        </div>
    
    </div>
</div>
</section>
<!-- end comments section-->



<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>


</body>
</html>