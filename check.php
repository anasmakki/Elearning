<!-- Header Start -->
<?php
include('./dbConnection.php');
?>
<!-- Header End -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">

    <link rel="stylesheet" href="style.css">
    
    <title>Hello, world!</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>

  <body>
    <h1>Hello, world!</h1>


<div class="col-lg-10 offset-lg-1 pt-5 pb-5 bg-dark text-light">
  <div id="client-testimonial-carousel" class="carousel slide" data-ride="carousel" style="height:200px;">
    <div class="carousel-inner" role="listbox">


    <?php
    // Testimonial - PHP Code
      $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
      $result = $conn->query($sql);
      $rows = $result->num_rows;
      if($rows > 0){
     while($row = $result->fetch_assoc()){  
      $stu_img = str_replace('..', '.', $row['stu_img']);
      $stu_name = $row['stu_name'];
      $stu_occ = $row['stu_occ'];
      $f_content = $row['f_content'];
      ?>


      <div class="carousel-item active text-center p-4">
        <blockquote class="blockquote text-center">
          <p class="mb-0"><i class="fa fa-quote-left"></i> <?php echo $f_content; ?>
          </p>
          <footer class="blockquote-footer"><?php echo $stu_name; ?> <cite title="Source Title">genius</cite></footer>
          <!-- Client review stars -->
          <!-- "fas fa-star" for a full star, "far fa-star" for an empty star, "far fa-star-half-alt" for a half star. -->
          <p class="client-review-stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="far fa-star"></i>
          </p>
        </blockquote>
      </div>
      <?php } } ?>

      
    </div>
    <ol class="carousel-indicators">
        <li data-target="#client-testimonial-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#client-testimonial-carousel" data-slide-to="1"></li>
        <li data-target="#client-testimonial-carousel" data-slide-to="2"></li>
    </ol>
</div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>