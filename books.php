<?php 
require_once 'dbh.php';
 $sql='SELECT * FROM produit';
    $res=$conn->query($sql);
    $conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Les livres</title>
    

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="books.css">

<style>
  .items{
    display: flex;
    justify-content:space-around;
    flex-wrap: wrap;
    padding: 10px;
  }
  .items li{
  display: inline;
  height: 100%;
  }
</style>
</head>

<body>

<div id="container">





<div class="row align-items-center" id="tous">
  <ul class="items" id="items" >
  <?php
  
  while($rows=$res->fetch_assoc())
  {
    
  ?>
<li >
 
<div class="col">
    <div class="my-2 mx-auto p-relative bg-white shadow-1 blue-hover" style="width: 360px; overflow: hidden; border-radius: 1px;">
        <img src="product_imgs/<?php echo $rows['idPdt'];?>.jpg" alt="Man with backpack"    height="400" width="200"
            class="d-block w-full">

  <div class="px-2 py-2" >
    <p class="mb-0 small font-weight-medium text-uppercase mb-1 text-muted lts-2px">
     <?php echo $rows['auteur'];?>
    </p>

    <h1 class="ff-serif font-weight-normal text-black card-heading mt-0 mb-1" style="line-height: 1.25;">
    <?php echo substr($rows['nomPdt'], 0,50)."...";?>

    </h1>

    <p class="mb-1">
    <?php
              echo substr($rows['Description'], 0,100)."...";
      ?>
    </p>

  </div>

  <a href="book.php?id=<?php echo $rows['idPdt']; ?>" class="text-uppercase d-inline-block font-weight-medium lts-2px ml-2 mb-2 text-center styled-link">
    Voir Plus
</a>
</div>
    </div>
  </li>
    <?php
    
      }
    ?>
  </ul>
    </div>


    
    </div> <!--end container-->
 





















<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

 



</div> 




</body>

</html