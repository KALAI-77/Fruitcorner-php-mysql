<style>

    h1{
        display:flex;
        justify-content:center;
        
    }
        
    
       .dbresult,.dbresult td,.dbresult th{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
            text-align: center;
            z-index: 1;
        }


        .dbresult{
            width: 97%;
            margin: auto;
        }

        .dbresult tr:nth-child(odd){
            background-color: #b2d0d6;
        }
        .dbresult tr:nth-child(even){
            background-color: lightcyan;
        }
        
    </style>


    <script>
        var times=document.getElementById("date");
       setInterval(() => {
        var date=new Date();
        times.innerHTML=date.toLocaleTimeString(); },1000)        
    </script>
    



<?php


date_default_timezone_set('Asia/Kolkata');


$currentDateTime = date('d-m-Y');

$style = 'color: black; font-size: 23px; padding:10px;';

$html = "<p style='$style'> $currentDateTime</p>";


echo $html;



$con=mysqli_connect('localhost','root','','fruitcorner');


if(isset($_POST['submit']))
{
    $code=$_POST['code'];
    $name=$_POST['name'];
    $price=$_POST['price'];

    $new="insert into fuits values('','$code','$name','$price')";
    $result=mysqli_query($con,$new);

}


$query="select sl_no,code,name,price from fuits";
$result=mysqli_query($con,$query);

$numrow=mysqli_num_rows($result);

if($numrow !=0)
{
    echo "<h1>FRUIT CORNER'S PRICE LIST</h1>";
  

    echo  '<table class="dbresult">';
    echo  '<tr>';
    echo  '<th>Sl No</th>';
    echo  '<th>CODE</th>';
    echo  '<th>NAME</th>';
    echo  '<th>PRICE PER K.G (inr)</th>';

    while ($row=mysqli_fetch_assoc($result))
    {
        echo '<tr>';
        echo '<td>' .$row['sl_no']. '</td>';
        echo '<td>' .$row['code']. '</td>';
        echo '<td>' .$row['name']. '</td>';
        echo '<td>' .$row['price']. '</td>';
        echo '<tr>';
    }
    echo '</table>';

}







?>
