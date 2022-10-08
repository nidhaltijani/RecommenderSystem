<?php 
require_once 'dbh.php';
 $sql='SELECT * FROM produit';
    $res=$conn->query($sql);
    $conn->close();
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


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!--recherche-->
  <!-- Navbar Search-->
           
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Rechercher" aria-label="Search for..." aria-describedby="btnNavbarSearch" id="recherche" onkeyup="filter()"/>
                    
                </div>
            
<!-- end search -->
</nav>




<div class="content mt-5">
            <ul class="rig columns-4" id="items">
                <?php while($rows=$res->fetch_assoc())
  {
    
  ?>
                <li>
                    <a href="#"><img class="product-image" src="product_imgs/<?php echo $rows['idPdt']; ?>.jpg"></a>
                    <h4><?php echo $rows['nomPdt']; ?></h4>
                     
                    <p><?php echo substr($rows['Description'],0,100); ?></p>
                    <div class="price"> <?php echo $rows['auteur']; ?></div>
                    
                    <hr>
                    
                    <a href="single.php?id=<?php echo $rows['idPdt']; ?>"><button class="btn btn-default btn-xs pull-left" type="button">
                        <i class="fa fa-eye"></i> Details
                    </button></a>
                </li>
                <?php } ?>
             
            </ul>
        </div>








<script>
        function filter(){
    input=document.getElementById('recherche');
    filtervalue=input.value.toUpperCase();
    ul=document.getElementById('items');
    li=ul.getElementsByTagName("li");
    for (let i = 0 ; i < li.length ; i++) {
        small = li[i].getElementsByTagName("h4")[0];
        if(small.innerHTML.toUpperCase().indexOf(filtervalue) > -1){
            li[i].style.display = "";
            
        }else{
            li[i].style.display = "none";
        }
    }
}
    </script>
</body>
</html>