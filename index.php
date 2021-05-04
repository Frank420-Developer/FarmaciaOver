<?php
  /* ..:: Imports Principales ::.. */
  require 'controllers/routes.php';
  require 'libs/view.php';
  include 'libs/log.php';

  $host_name = "http://localhost/FarmaciaOVER";
  $site_name = "Farmacia OVER";

  $app = new Routes($host_name, $site_name);
?>