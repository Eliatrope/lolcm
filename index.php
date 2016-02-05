<!DOCTYPE html>
<?php $start = microtime(true); ?>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://v4-alpha.getbootstrap.com/favicon.ico">

    <title>LoL CM</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="./css/navbar-top-fixed.css" rel="stylesheet">
    <style type="text/css"></style></head>

    <?php
      require('func.php');
      require('key.php');

      $getchampion = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/champion?locale=en_US&champData=image&api_key=' . $apiKey);
      $list = json_decode($getchampion, true);

      $getversion = file_get_contents('https://global.api.pvp.net/api/lol/static-data/euw/v1.2/versions?api_key=' . $apiKey);
      $version = json_decode($getversion, true);
      
      $champion = array_sort($list['data'], 'name', SORT_ASC);
      //echo $list['data']['Zed']['name'];
    ?>

  <body>

    <div class="pos-f-t">
      <div class="collapse" id="navbar-header" aria-expanded="false" style="height: 0px;">
        <div class="container-fluid bg-inverse p-a-1">
          <h3>Welcome to LoL CM !</h3>
          <p>Credits to Pierre S. , Hugo B. & Julien B.</p>
        </div>
      </div>
      <div class="navbar navbar-light bg-faded navbar-static-top">
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-header" aria-expanded="false">
          ☰
        </button>
        <form class="pull-xs-right">
          <input type="text" class="form-control" id="searchfield" placeholder="Search...">
        </form>
      </div>
    </div>

    <div class="container">
      <h1>LoL Champion Masteries</h1>
      <span id='load'></span>
      <div class="jumbotron">
        <div class='champions'>
          <?php
            foreach ($champion as $data){
              print 
              "
                <div class='subchamp ". $data['key'] ."'>
                  <img width='50px' src='http://ddragon.leagueoflegends.com/cdn/". $version[0] ."/img/champion/". $data['image']['full'] . "'>
                  <p>". $data['name']. "</p>
                  <p style='display:none;'>". $data['title'] ."</p>
                </div>
              ";
            }
          ?>
        </div>
      </div>
    </div>

    <div class="modal fade" id="champmodal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" style='background-size: cover;'>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="./js/ie10-viewport-bug-workaround.js"></script>
  
<h6 id='loadtime' style='display:none;'>Loaded in <?php loadTime($start); ?>s</h6>
</body></html>