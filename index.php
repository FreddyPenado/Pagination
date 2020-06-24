<?php

try {
    $conection = new PDO('mysql:host=localhost; dbname=paginacion', 'root','');

}catch (PDOException $e){
    echo "ERROR:" . $e->getMessage();
    die();
}
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$postPerPage = 5;

$start = ($page > 1) ? ($page * $postPerPage - $postPerPage) : 0;

$articles = $conection->prepare("SELECT sql_calc_found_rows  * FROM articulos LIMIT $start, $postPerPage");
$articles->execute();
$articles = $articles->fetchAll();
//print_r($articles);
if (!$articles){
    header('Location: index.php');
}

//contabilizar la cantidad de articulos obtenidos en  nuestra base de datos
$totalarticles = $conection-> query('SELECT FOUND_ROWS() as total ');
$totalarticles = $totalarticles->fetch()['total'];

//contabilizar las  paginas que obtendremos dependiendo la cantidad de articulos
$pagenum = ceil($totalarticles / $postPerPage) ;
 require "index.view.php";

