  <html>
<head>
<style>

h1{margin-left:30%; color:green;font-size:40px;}
div{width:50%;
margin-left:10%;
font-size:15px;
}
input{ width:70%;
height:40px;
font-size:18px;
border-radius:6px;
background:black;
color:white;
}
.label{
	font-size:20px;
}
#img{margin-left:40px;}
input[type="submit"]{
	width:100px;
	margin-left:400px;
	background:green;
	color:white;
}
</style>

</head>
  <h1><u>Rayon </u></h1> 
		<form method="post" action="saisirayon.php"><div >
		<img src="rayon.jpg"  height="300px" id="img"><br/><br/>
		<span class="label"><img src="214.png" width="20px" height="20px"/> Nom du rayon:</span>
		<input type="text" required placeholder="Enter nom du rayon" name="Rayon">
		<input type="submit" value="OK">
		</div></form>
 </html>