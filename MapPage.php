<html>

<head>
<script>



</script>
<style>

body{
    
    /*background-color:grey;*/
    background-image: url("robo.png" ) ;
    background-repeat: no-repeat;
    background-size: cover;
}

.list{
       position: absolute;
       top:15%;
       right:85%;
    
       

      
    
       
    }
    label {
      background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding: 20px;
      width: 20px;
      height: 20px;
      display: inline-block;
      margin: 2px ;
      cursor: pointer;
      outline:none;
      border-radius: 12px;
      
      
      
    }
    .in{
        
        background-color: white; /* Green */
      border: none;
      color: red;
      padding: 20px;
      width: 100px;
      height: 60px;
      display: inline-block;
      margin: 2px ;
      cursor: pointer;
      outline:none;
      border-radius: 12px;
      
     
      

    }
    .F{
    
        top:35%;
        left: 4.8%;
    
                   border: 4px solid #fff;
                   transform: translateY(-50%) rotate(-45deg);
                  /* border-top: none;
                   border-right: none;*/
                   border-bottom: none;
                   border-left: none;
                   position: absolute;
                   width: 20px;
                   height: 20px;
                   
                   transition: .5s;
    

   }
   
   .R{
    
    top:25.4%;
    left: 4.5%;

    border: 4px solid #fff;
    transform: translateY(-50%) rotate(-45deg);
    border-left: none;
    border-top: none;
    position: absolute;
    width: 20px;
    height: 20px;
    transition: .5s;
    }
   
   .sL{
    top:17%;
                   left: 68;
    
                   border: 4px solid #fff;
                   transform: translateY(-50%) rotate(-45deg);
                   border-right: none;
                   border-bottom: none;
                   position: absolute;
                   width: 20px;
                   height: 20px;
                   transition: .5s;
   }
   .bigbox{

/*	position: absolute;*/
	width: 1345px;
	height: 400px;
    margin-top:5%;
    margin-right: 90;
    margin-left: 10;
	padding: 30px;
	border-radius: 20px;
	background: #ffffff;
    box-shadow: 0 10px 30px rgba(0,0,1,1);
    background-color:rgba(192,192,192,0.3); /* Black w/opacity/see-through */
    
}
.container{
	height: 300px;
	display: flex;
/*	flex-wrap: wrap;*/
}
.lleft{
    
     margin-left:30%;
      margin-right: 10;
     
    
}
div.settings {
    display:grid;
    grid-template-columns: max-content max-content;
    grid-gap:5px;
}
div.settings label       { text-align:right; }
div.settings label:after { content: ; }
table,td{
 border: 3px solid white; 
}
table{
  margin-left:20%;
  margin-top:-20%
}
td{
  color: red;
}
.sinput{

    background-color: #4CAF50; /* Green */
      border: none;
      color: white;
      padding:0px;
      width: 70px;
      height: 40px;
      display: inline-block;
      margin: 4px 2px;
      cursor: pointer;
      margin-top:6%;
      font-size:16px;
      text-align: center;
      border-radius: 12px;
}
canvas{
margin-left:60%;
margin-top:-9.4%;
border:  2px solid #00b300;


}
#corner{
      position: absolute;
      top: -4px;
      left: 16px;
    }
</style>


</head>

<body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<?php
$conn=new mysqli("localhost","panel","12345","ControlPanel");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
 if(array_key_exists('s',$_POST)){
    $sql="
    INSERT INTO `AUTUNUM`(`FORW`, `LEF`, `RIHT`) VALUES ('$_POST[autoF]','$_POST[autoL]','$_POST[autoR]')";

 // $sql="DELETE FROM AUTUNUM WHERE RIHT=0 ";

}

   if ($conn->query($sql) === TRUE) {
       echo "";
      }
      else {
        echo "Error creating table: ". $conn->error;
      }
      $conn->close();


      $numL= $_POST['autoL'];
      $numR= $_POST['autoR'];
      $numF= $_POST['autoF'];

      //$query_string = "delete from $table_info where user_id='id'";

      
?>

<div class="bigbox">
  		
<form    method="POST">
    <div class="settings" class="list">
    <label > <span class="sL"></span></label>
 <input name ="autoL"class="in" type="number" value=0></input>
  <label  > <span class="R"></span></label>
    <input name="autoR"class="in" type="number" value=0></input>
   <label ><span class="F"></span></label>
    <input name="autoF" class="in" type="number" value=0></input>
</div>
<div>
<input name="s"class="sinput" type="submit" value="save"  ></input>
<input id="st" class="sinput" type="button" value="start"></input>
<input  id="Dt"class="sinput" type="button" value="delete"></input>
<table   method="POST">
       <tr>
       <td >Left :</td>
       <td> <?php echo $numL." km";?></td>
       </tr>
       <tr> <td > Right :</td> <td><?php echo $numR." km";?></td> </tr>
       <tr > <td >Forward :</td> <td><?php echo $numF." km";?> </d></tr>
      </table>
      
<canvas id="canvas" width="450" height="300">
Your browser does not support the HTML5 canvas tag.</canvas>
    <div>

  		<div class="container">


</div>

      
</div>


</form>
<script>
  $(document).ready(function(){
  
    $("table").hide();
    $("canvas").hide();
 
});
$(document).ready(function(){
  $("#st").click(function(){
    $("table").show();
   $("canvas").show();

  });
});
$(document).ready(function(){
  $("#Dt").click(function(){
    
   $V=" <?php
$conn=new mysqli("localhost","panel","12345","ControlPanel");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
  $sql="DELETE FROM AUTUNUM WHERE RIHT not like '%.%' ";
  //$sql="DELETE FROM AUTUNUM WHERE RIHT != 0";


   
      
      $conn->close();

     
      //$query_string = "delete from $table_info where user_id='id'";

      
?>";

   

  });
});
//var lef=document.getElementById("vLeft");
var usL="<?php  echo $numL ?>";
var usR="<?php  echo $numR ?>";
var usF="<?php  echo $numF ?>";



var c =document.getElementById("canvas");
var cx=c.getContext("2d");
//cx.lineWidth = 10;
cx.strokeStyle='red';
cx.fillStyle='yellow'; // for the triangle fill
//cx.lineJoin = 'butt';

if(usF!=0){
  cx.beginPath();

  cx.moveTo(200,290);
cx.lineTo(200,usF);// y minmum 100  to be larger  maximum 250  to be smaller F

}

if(usR!=0){
  if(usF==0){
    usF=100;

    cx.beginPath();

    cx.moveTo(200,usF);
    cx.lineTo(usR,usF);

  }else{
  
cx.lineTo(usR,usF);// same privious y R x>200-400
  }
}


if(usL!=0){
  if(usR==0){
    //cx.beginPath();
    //cx.moveTo(200,usF);
    cx.lineTo(50, usF); }

  if(usL==0){
    
cx.lineTo(usR, 50);//same priveous x L
  }
  if(usR==0 &&usF==0){
    cx.beginPath();
usF=100;
    cx.moveTo(200,usF);
  cx.lineTo(50, usF);//same priveous x L

  }
 
    cx.lineTo(50, usF);//same priveous x L


  

}

//cx.stroke();
//cx.lineTo(350,250);// same privious y
//cx.lineTo(350, 50);//same priveous x
cx.stroke();


/*
function canvas_arrow(context, fromx, fromy, tox, toy, r){
	var x_center = tox;
	var y_center = toy;
	
	var angle;
	var x;
	var y;
	
	context.beginPath();
	
	angle = Math.atan2(toy-fromy,tox-fromx)
	x = r*Math.cos(angle) + x_center;
	y = r*Math.sin(angle) + y_center;

	context.moveTo(x, y);
	
	angle += (1/3)*(2*Math.PI)
	x = r*Math.cos(angle) + x_center;
	y = r*Math.sin(angle) + y_center;
	
	context.lineTo(x, y);
	
	angle += (1/3)*(2*Math.PI)
	x = r*Math.cos(angle) + x_center;
	y = r*Math.sin(angle) + y_center;
	
	context.lineTo(x, y);
	
	context.closePath();
	
	context.fill();
}*/
</script>
<img src="logo.png" alt="logo" style="width:200px;height:100px"; id="corner">
</body>





</html>