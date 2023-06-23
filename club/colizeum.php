<?php
  require "../db.php";
  if (isset($_SESSION['reg_user_session'])) {
    $data = $_POST;
    if (isset($data['exit'])) {
      session_destroy();
      header("Location:" . $site_url . "/profil/auth");
    };
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
          <div class="navbar-brand d-lg-block dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Категория
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <button data-filter="all" class="dropdown-item btn-filter">Все</button>
              <button data-filter="comp" class="dropdown-item btn-filter">Компьютеры</button>
              <button data-filter="cons" class="dropdown-item btn-filter">Приставки</button>
            </div>
          </div>
          <form class="navbar-brand d-none d-lg-block" method="POST" action="colizeum">  
                <input class="exitnav" type="submit" name="exit" value="Выйти">
          </form>
        </nav>
      </div>
      <div class="container">
        <div class="row">
          <?php
            $seachinfos = R::getAll('SELECT * FROM pc');
            foreach($seachinfos as $seachinfo){
              $proc = (($seachinfo['stat'])/($seachinfo['number']))*100;
              $proc = round($proc);
              print("<div class=\"col-md-3\"><div class=\"card\"><div class=\"card-body\"><h5 class=\"card-title card-category-{$seachinfo['categori']}\">Зал №{$seachinfo['id']}</h5><div class=\"progress\"><div id=\"bar-col\" class=\"progress-bar\" role=\"progressbar\" style=\"width: {$proc}%;\" aria-valuenow=\"90\" aria-valuemin=\"0\"aria-valuemax=\"100\">{$proc}%</div></div><img src=\"{$seachinfo['img']}\" class=\"card-img-top\" alt=\"картинка\"></div><div class=\"card-footer\"><small class=\"text-muted\">Заполненность {$seachinfo['stat']} из {$seachinfo['number']} мест</small><a href=\"\43\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"\43modal{$seachinfo['id']}\">Подробнее</a></div></div></div>");
              print("<div class=\"modal fade\" id=\"modal{$seachinfo['id']}\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"modal1Label\" aria-hidden=\"true\"><div class=\"modal-dialog modal-dialog-centered\" role=\"document\"><div class=\"modal-content\"><div class=\"modal-header\"><h5 class=\"modal-title\" id=\"modal{$seachinfo['id']}Label\">Зал №{$seachinfo['id']}</h5></div><div class=\"modal-body\"><p>Описание зала №{$seachinfo['id']}: {$seachinfo['comment']}</p><ul><li>Всего мест: <b>{$seachinfo['number']}</b></li><li>Характеристики устройств: <br><b>{$seachinfo['characteristic']}</b></li></ul></div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Закрыть</button></div></div></div></div>");
            };
          ?>
        </div>
      </div>
      <script>
        $(document).ready(function() {
          $('.btn-filter').click(function() {
            var filter = $(this).data('filter');
            if (filter == 'all') {
              $('.card').show();
            } 
            else {
              $('.card').hide();
              $('.card-category-' + filter).closest('.card').show();
            }
            $(this).addClass('active').siblings().removeClass('active');
          });
        });

        $(document).ready(function() {
          $('.btn-primary').click(function() {
            var target = $(this).attr('data-target');
            $(target).modal('show');
          });
        });
      </script>
    </body>
  </html>
<?php
  } else {
    header("Location:" . $site_url . "/profil/auth");
  };
?>