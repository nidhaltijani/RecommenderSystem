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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="test.css">
  	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body class="bg-info">



 
<div class="container">

    <div class="row text-white">
        <div class="col-md-6 ">
            <img src="product_imgs/<?php echo $row['idPdt']; ?>.jpg" alt="" class='img-fluid' style='height:500px;width:500px;'>
            
        </div>
        <div class="col-md-6 pt-5">
        <h3><b><?php echo $row['nomPdt'] ?></b></h3>
        <h2><?php echo $row['auteur'] ?></h2>
<p><?php echo $row['Description']; ?></p>



</div>
        
        </div>
</div>




 


<!-- ici-->

 
 
 







       







<div class="card">
<div class="card-header">
Related Books

</div>
<div class="card-body">
    
<div class="mt-5">
<ul class="rig columns-4">

 

                <li>
                    <a href="single.php?id=<?php $row1['idPdt']; ?>"><img class="product-image" src="product_imgs/<?php echo $row1['idPdt'] ?>.jpg"></a>
                    <h4><?php echo $row1['nomPdt']; ?></h4>

                    <p>     <?php echo substr($row1['Description'],0,300); ?>             </p>
                    <div class="price"> <b><?php echo $row1['auteur']; ?> </b></div>
                    
                    <hr>
                    <!-- <button class="btn btn-default btn-xs pull-right" type="button">
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </button> -->
                    <div class="text-center"> 
                    <a href="single.php?id=<?php echo $row1['idPdt']; ?>" class="btn btn-default btn-xs pull-left">
                        <i class="fa fa-eye"></i> Details
                    </a>
                    </div>
                   
                </li>
                <!--top2-->
                <li>
                    <a href="single.php?id=<?php $row2['idPdt']; ?>"><img class="product-image" src="product_imgs/<?php echo $row2['idPdt'] ?>.jpg"></a>
                    <h4><?php echo $row2['nomPdt']; ?></h4>

                    <p>     <?php echo substr($row2['Description'],0,300); ?>              </p>
                    <div class="price"> <b><?php echo $row2['auteur']; ?> </b></div>
                    
                    <hr>
                    <!-- <button class="btn btn-default btn-xs pull-right" type="button">
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </button> -->
                    <div class="text-center"> 
                    <a href="single.php?id=<?php echo $row2['idPdt']; ?>" class="btn btn-default btn-xs pull-left">
                        <i class="fa fa-eye"></i> Details
                    </a>
                    </div>
                   
                </li>

                <li>
                    <a href="single.php?id=<?php $row3['idPdt']; ?>"><img class="product-image" src="product_imgs/<?php echo $row3['idPdt'] ?>.jpg"></a>
                    <h4><?php echo $row3['nomPdt']; ?></h4>

                    <p>     <?php echo substr($row3['Description'],0,300); ?>              </p>
                    <div class="price"> <b><?php echo $row3['auteur']; ?> </b></div>
                    
                    <hr>
                    <!-- <button class="btn btn-default btn-xs pull-right" type="button">
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </button> -->
                    <div class="text-center"> 
                    <a href="single.php?id=<?php echo $row3['idPdt']; ?>" class="btn btn-default btn-xs pull-left">
                        <i class="fa fa-eye"></i> Details
                    </a>
                    </div>
                   
                </li>

                 
 
             
            </ul>


</div>

</div>
</div>






















































