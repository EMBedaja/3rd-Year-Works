<html>
<head></head>
 <link rel="stylesheet" href="stylesheet.css">
<body>

<div class="images"> 
    <center> <img src="calclulator.png" alt=" " width="1300" height="200"></center>
</div>

    <center><form method="POST" action="output.php">

    <span>   First Number: &nbsp;  &nbsp;  &nbsp;</span> 
        <input type="text" name="firstNumber" style="margin-left:-40px"><br><br> 
    <span >   Second Number:&nbsp;  &nbsp;       </span> 
        <input style="margin-left:-20px" type="text" name=" secondNumber"><br><br>
    <span >   Operator: &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;   </span>
        <select  name="operator" style="margin-left:-45px" >
<option > </option> 
<option > Add </option> 
<option> Subtract </option>
<option> Multiply </option> 
<option> Divide </option>
        </select>
        <br><br>
<input style="background-color: #21EF80;color:black;" type="submit" value="Solve">

</form></center>
       <div class="house"> 
    <center><img src="house.png" alt=" " width="1330" height="290"></center>
    </div>
     
</body> </html>