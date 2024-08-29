<html>
<head> </head>
    <link rel="stylesheet" href="stylesheet.css">
    <body>
        <div class="images"> 
            <center> <img src="gameover.png" alt=" " width="1250" height="150" style="margin-top:-10px;"></center></div>
    <?php
        $firstnumber  = $_POST ['firstNumber'];
        $secondnumber = $_POST ['secondNumber'];
        $operator     = $_POST ['operator'];
        switch ($operator)
        { 
            case 'Add'       : $output = $firstnumber + $secondnumber;
                break;
            case 'Subtract'  : $output = $firstnumber - $secondnumber;
                break;
            case 'Multiply'  : $output = $firstnumber * $secondnumber;
                break;
            case 'Divide'    : $output = $firstnumber / $secondnumber;
                break;
            default: $output = 'invalid';
        }
        ?>
    <center>   
        <span> First Number :  &nbsp;  &nbsp; </span> 
        <span style="color:#21EF80"> <?php echo $firstnumber;  ?> </span> <br>
        <span> Second Number:  &nbsp;  &nbsp; </span>  
        <span style="color:#21EF80"><?php echo $secondnumber; ?> </span> <br>
        <span> Operator     :  &nbsp;  &nbsp;  </span> 
        <span style="color:#21EF80"><?php echo $operator;     ?> </span> <br>
        <span> Output       :  &nbsp;  &nbsp; </span>
        <span style="color:#21EF80"><?php echo $output;       ?> </span><br> <br><br>
        <a href="index.php"> NEW </a>
    </center>  
        
    <div class="house2"> 
    <center><img src="house2.png" alt=" " width="1330" height="290"></center>
    </div>
    </body>
</html>