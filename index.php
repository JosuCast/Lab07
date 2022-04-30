<?php
include_once 'crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Libros - Tecsup</title>
    <link rel="icon" href="https://is3-ssl.mzstatic.com/image/thumb/Purple125/v4/af/c4/b6/afc4b64b-ed7d-c106-d744-6e67b7b58938/source/256x256bb.jpg">
    <link href="css/estilos.css?" rel="stylesheet" >
    <meta charset="utf-8"> 
</head>
<body>
    <header>
        <img src="https://4.bp.blogspot.com/-6N-Ug1BVq_4/WbLU5EQ7osI/AAAAAAAAAqw/xOnXqTDsJmst4uff7-dsuVKFd5fPzjB9wCK4BGAYYCw/s1600/Logo%2Bpositivo_fondotransparente.png" alt="">
        <h1>Biblioteca Digital</h1>
    </header>
        <br>
        <br>
        <div id="form">
            <div class="titulo">
            <h1 class="h1">Lista de Libros</h1>
            </div>
            <br><br>
        <table cellpadding="25" class="tabla">
                <tr class="tr">
                    <td class="td">ID</td>
                    <td class="td" width="200px">Titulo</td>
                    <td class="td" width="200px">Autor</td>
                    <td class="td">Año de publicacion</td>
                    <td class="td">Editorial</td>
                    <td class="td">Especialidad</td>
                    <td class="td" width="300px">URL</td>
                    <td colspan=2 class="td" width="350px">Acciones</td>
                </tr>
                <?php
                $res = $MySQLiconn->query("SELECT * FROM libros");
                while ($row=$res->fetch_array()) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['titulo']; ?></td>
                    <td><?php echo $row['autor']; ?></td>
                    <td><?php echo $row['año']; ?></td>
                    <td><?php echo $row['editorial']; ?></td>
                    <td><?php echo $row['especialidad']; ?></td>
                    <td><a href="<?php echo $row['url']; ?>" id="url" id="a">Leer Libro</a></td>
                    <td><a href="?edit=<?php echo $row['id'];?>" onclick="return confirm('Confirmar edición')" id="editar">Editar</a></td>
                    <td><a href="?del=<?php echo $row['id'];?>" onclick="return confirm('Confirmar eliminación')" id="eliminar">Eliminar</a></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <br><br><br>
            <form method="post">
            <h1 class="añadir">Añadir Libro</h1>
        <table width="100%" border="1" cellpadding="15px" class="nuevo">
                    <tr>
                        <td>
                            <input type="text" name="titulo" placeholder="Titulo" value="<?php 
                            if(isset($_GET['edit'])) echo $getROW['titulo'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="text" name="autor" placeholder="Autor" value="<?php 
                            if(isset($_GET['edit'])) echo $getROW['autor'];?>"> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="año" placeholder="Año" value="<?php 
                            if(isset($_GET['edit'])) echo $getROW['año'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="text" name="editorial" placeholder="Editorial" value="<?php 
                            if(isset($_GET['edit'])) echo $getROW['editorial'];?>"> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="especialidad" placeholder="Especialidad" value="<?php 
                            if(isset($_GET['edit'])) echo $getROW['especialidad'];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="text" name="url" placeholder="URL" value="<?php 
                            if(isset($_GET['edit'])) echo $getROW['url'];?>"> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                if(isset($_GET['edit'])){
                                    ?>
                                        <button type="submit" name="update">Editar</button>
                                    <?php
                                }else{
                                    ?>
                                    <button type="submit" name="save"> Registrar</button>
                                    <?php
                                }

                            ?>
                        </td>
                    </tr>
                </table>
            </form>
            <br>
            <br>
        </div>
        <br><br>
</body>
</html>