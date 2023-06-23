<?php
  require "../db.php";
  if (isset($_SESSION['reg_user_session'])) {
    $data = $_POST;
    if (isset($data['exit'])) {
      session_destroy();
      header("Location:" . $site_url . "/profil/auth");
    }
?>
  <!DOCTYPE html>
  <html lang="ru">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/png" href="../image/logo.ico" type="img/x-icon">
      <link rel="icon" href="../image/logo.ico" type="image/x-icon">
      <title>Colizeum</title>
      <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.2/normalize.css" />
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>
    <body class="default">
      <div class="coliznav">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 0px 20px;">
          <a class="navbar-brand" href="https://colizeumarena.com/">Главная Colizeum</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="colizeum_services"><i class="bi bi-activity iconav"></i> Услуги</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="colizeum"><i class="bi bi-people-fill iconav"></i> Посетители</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://colizeumarena.com/kibernovosti/" target="_blank"><i class="bi bi-newspaper iconav"></i> Киберновости</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://colizeumarena.com/contacts/" target="_blank"><i class="bi bi-person-rolodex iconav"></i> Контакты</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-aspect-ratio iconav"></i> О нас</a>
              </li>
              <li class="nav-item mr-auto d-lg-none">
                <form class="nav-link" method="POST" action="colizeum">  
                  <input type="submit" name="exit" value="Выйти" style="padding: 0px;"/> 
                </form>
              </li>
            </ul>
          </div>
          <form class="navbar-brand d-none d-lg-block" method="POST" action="colizeum">  
                <input class="exitnav" type="submit" name="exit" value="Выйти">
          </form>
        </nav>
      </div>
      <div class="container"> 
        <div class="row justify-content-center"> 
          <?php 
            $seachinfos = R::getAll('SELECT * FROM services'); 
            foreach($seachinfos as $seachinfo){ 
              $halls = str_replace(",",' | ', $seachinfo['hall']);
              print("<div class=\"card-deck col-md-6\"><div class=\"card flex-column\"><img src=\"{$seachinfo['img']}\" class=\"card-img-top\" alt=\"Image\"><div class=\"card-body text-center mt-auto\"><h5 class=\"card-title\">{$seachinfo['comment']}</h5><p class=\"card-text\">Зал {$halls}</p><button type=\"button\" class=\"btn btn-primary align-self-end\" data-toggle=\"modal\" data-target=\"#Modalu{$seachinfo['id']}\">Оформить</button></div></div></div>"); 
              print("<div class=\"modal fade\" id=\"Modalu{$seachinfo['id']}\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"Modalu1Label\" aria-hidden=\"true\"><div class=\"modal-dialog modal-lg\" role=\"document\"><div class=\"modal-content\"><div class=\"modal-header\"><h5 class=\"modal-title\">{$seachinfo['description']}</h5></div><div class=\"modal-body\" data-price=\"{$seachinfo['price']}\"><div class=\"row align-items-center\"><div class=\"col-4\"><h6>{$seachinfo['description']} (оплата за час)</h6></div><div class=\"col-4 text-center\"><button type=\"button\" class=\"btn btn-sm btn-outline-primary minus-btn\">-</button><span class=\"mx-2 item-count\">1</span><button type=\"button\" class=\"btn btn-sm btn-outline-primary plus-btn\">+</button></div><div class=\"col-4 text-right\"><h6 class=\"price-text\">{$seachinfo['price']} рублей</h6></div></div><div class=\"text-right mt-3\"><button type=\"button\" class=\"btn btn-primary\">Оформить заказ</button></div></div></div></div></div>"); 
            }; 
          ?> 
        </div> 
      </div>
      <script>
        $(document).ready(function(){
          $(".plus-btn").click(function(){ 
            var itemCount = parseInt($(this).prev(".item-count").text()); 
            var price = parseFloat($(this).closest(".modal-body").data("price"));
            if(itemCount < 24){ 
              $(this).prev(".item-count").text(itemCount + 1); 
              var totalPrice = (itemCount + 1) * price;
              var priceText = totalPrice + " рублей"; 
              $(this).closest(".modal-body").find(".price-text").text(priceText); 
            } 
          }); 

          $(".minus-btn").click(function(){ 
            var itemCount = parseInt($(this).next(".item-count").text()); 
            var price = parseFloat($(this).closest(".modal-body").data("price"));
            if(itemCount > 1){ 
              $(this).next(".item-count").text(itemCount - 1); 
              var totalPrice = (itemCount - 1) * price;
              var priceText = totalPrice + " рублей"; 
              $(this).closest(".modal-body").find(".price-text").text(priceText); 
            } 
          });
        });
      </script>
    </body>
  </html>
<?php
  } else {
    header("Location:" . $site_url . "/profil/auth");
  }
?>