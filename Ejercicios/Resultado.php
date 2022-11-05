<?php
    session_start();
    if(!isset($_SESSION['count'])){
        $_SESSION['count'] = 1;
    }else{
        $_SESSION['count'] += 1;
    }
    echo $_SESSION['count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .ejercicio{
            color: <?php echo $_POST['color'];?>;
            font-family: <?php echo $_POST['fuenteTexto'];?>;
            font-size: <?php echo $_POST['rango']?>;
        };
    </style>
</head>
<body>
    <div style="text-align: center">
       <p class="ejercicio">Site developed by : <?php echo $_POST['nombre']." "; echo $_POST['apellido']." "; echo $_POST['apellido2'];?></p>
       <?php
        echo "Two days ago it was: ";
        echo date('d-m-Y',strtotime('-2 days'));
        echo '<br>';
        echo "The next month is: ";
        echo date('F', strtotime('+1 month'));
        echo '<br>';
        function dias_hasta_fin_mes(){
            $total_mes = cal_days_in_month(CAL_GREGORIAN, date('m'), date("Y"));
            $transcurrido = date('d');
            return $total_mes - $transcurrido;

        }
        echo "There are " . dias_hasta_fin_mes(). ' days left in the month';
        echo '<br>';
        $dia = 12-date('m');
        echo "There are ". $dia . " months in the current year";
        echo '<br>';
        function mostrar_horario(){
            $mes_actual = date('m');
            if($mes_actual>= '06' && $mes_actual<= '09'){
                return 'Good Summer!!!';
            }else{
                return 'Good Winter!!!';
            }
        }
        echo mostrar_horario();
        echo "<br>";
        $name = $_POST['nombre'];
        $surname = $_POST['apellido'];
        $surname2 = $_POST['apellido2'];
        $nacer = $_POST['nacimiento'];
        $color = $_POST['color'];
        $rango = $_POST['rango'];
        if(!isset($_POST['checkbox'])){
            $comprobar = $_POST['checkbox']=true;
        }else{
            $comprobar = $_POST['checkbox']=false;
        }
        if($comprobar==true){
            setcookie('nombre', $name, time()+60);
            setcookie('apellido', $surname, time()+60);
            setcookie('apellido2', $surname2, time()+60);
            setcookie('nacer', $nacer, time()+60);
            setcookie('color', $color, time()+60);
            setcookie('rango', $rango, time()+60);
        }else{
            echo "Error";
        }
        
        //echo $_COOKIE['nombre']. " ". $_COOKIE['apellido']. " ". $_COOKIE['apellido2']. " ". $_COOKIE['nacer']." ". $_COOKIE['color']." ". $_COOKIE['rango'];
        //CONTADOR VISITAS
        /*
        if(isset($_SESSION['contador'])){
            $_SESSION['contador']=1;
        }else{
            $_SESSION['contador']+=1;
        }
        $mensaje = "Has visitado esta página ". $_SESSION['contador']. " veces";
        echo $mensaje;
        */
        echo '<p><a href="https://github.com/daw2-munoz22" target="_blank">Enlace al GitHub</p>';
        echo '<p><a href="MostrarCookie.php" target="_blank">Ver valores Cookie</p>';
    ?>
    <?php
       
    ?>
    </div>
</body>
</html>