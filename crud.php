<?php
include_once 'db.php';

if(isset($_POST['save']))
{

    $titulo = $MySQLiconn->real_escape_string($_POST['titulo']);
    $autor = $MySQLiconn->real_escape_string($_POST['autor']);
    $año = $MySQLiconn->real_escape_string($_POST['año']);
    $editorial = $MySQLiconn->real_escape_string($_POST['editorial']);
    $especialidad = $MySQLiconn->real_escape_string($_POST['especialidad']);
    $url = $MySQLiconn->real_escape_string($_POST['url']);


    $SQL = $MySQLiconn->query("INSERT INTO libros(titulo,autor,año,editorial,especialidad,url) VALUES('$titulo','$autor','$año','$editorial','$especialidad','$url')");
    header("Location: index.php");
    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}

if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM libros WHERE id=".$_GET['del']);
    header("Location: index.php");
}

if(isset($_GET['edit']))
{   
    $SQL = $MySQLiconn->query("SELECT * FROM libros WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();
}
if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE libros SET titulo='".$_POST['titulo']."',autor='".$_POST['autor']."',año='".$_POST['año']."',editorial='".$_POST['editorial']."',especialidad='".$_POST['especialidad']."',url='".$_POST['url']."'WHERE id=".$_GET['edit']);
    header("Location: index.php");
}
?>