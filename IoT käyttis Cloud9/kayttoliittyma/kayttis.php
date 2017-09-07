<?php
  if(isset($_POST['ohjaus1'])) {
    $string = implode("", $_POST['ohjaus1']);
    if(is_numeric($string))
      file_put_contents("ohjaus1.txt", $string);
  }
?>


<head>
  <title>IoT Ohjaussivusto done by RT</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel=stylesheet type="text/css" href="stylesheet.css">
  <script src="https://code.jquery.com/jquery-2.2.3.js" integrity="sha256-laXWtGydpwqJ8JA+X9x2miwmaiKhn8tVmOVEigRNtP4=" crossorigin="anonymous"></script>
</head>


  <body>
    <div id="page">
    
      <div id="header">
      </div>
    
    <div id="content">
    <nav>
      <p id="menuButton">Valikko</p>
        <ul>
          <li><a href="Ek_laite.php">Eka laite</a></li>
          <li><a href="Toka_laite.php">Toka laite</a></li>
          <li><a href="Kolmas_laite.php">Kolmas laite</a></li>
          <li><a href="Neljäs_laite.php">Neljäs laite</a></li>
        </ul>
    </nav>
    
  <main>
    
    <form id="form" method="POST">
    <table>
      <tr>
     <th>Wemos D1 R2 Led ohjaus </th>
      </tr>
        <tr>                  
          <td>Wemos D1 R2</td>
          <td>Keltainen Led päälle/pois päältä</td>
          <td>Tähän tulee laitteen toiminnon current status</td>
          <td><div class="control" id="ON1"><i class="material-icons">face</i></div></td>
          <td><div class="control" id="OFF1"><i class="material-icons">face</i></div></td>
        </tr>
        <tr>                  
          <td>Wemos D1 R2</td>
          <td>Keltainen Led päälle/pois päältä</td>
          <td>Tähän tulee laitteen toiminnon current status</td>
          <td><div id="ON2"><i class="material-icons">face</i></div></td>
          <td><div id="OFF2"><i class="material-icons">face</i></div></td>
        </tr>                  
       <tr>                  
          <td>Wemos D1 R2</td>
          <td>Keltainen Led päälle/pois päältä</td>
          <td>Tähän tulee laitteen toiminnon current status</td>
          <td><div id="ON3"><i class="material-icons">face</i></div></td>
          <td><div id="OFF3"><i class="material-icons">face</i></div></td>
       </tr>
       <tr>                  
          <td>Wemos D1 R2</td>
          <td>Keltainen Led päälle/pois päältä</td>
          <td>Tähän tulee laitteen toiminnon current status</td>
          <td><div id="ON4"><i class="material-icons">face</i></div></td>
          <td><div id="OFF4"><i class="material-icons">face</i></div></td>
                 <tr>                  
          <td>Wemos D1 R2</td>
          <td>Srvo 0/180 astetta</td>
          <td>Tähän tulee laitteen toiminnon current status</td>
          <td><div class="control" id="SERVO1_0"><i class="material-icons">face</i></div></td>
          <td><div id="SERVO1_180"><i class="material-icons">face</i></div></td>
       </tr>
       <tr>                  
          <td>Wemos D1 R2</td>
          <td>Servo 30/150 astetta</td>
          <td>Tähän tulee laitteen toiminnon current status</td>
          <td><div id="SERVO1_30"><i class="material-icons">face</i></div></td>
          <td><div id="SERVO1_150"><i class="material-icons">face</i></div></td>
      </tr>
       <tr>
          <td>Wemos D1 R2</td>
          <td>Servo 60/120 astetta</td>
          <td>Tähän tulee laitteen toiminnon current status</td>
          <td><div id="SERVO1_60"><i class="material-icons">face</i></div></td>
          <td><div id="SERVO1_120"><i class="material-icons">face</i></div></td>
       </tr>
       <tr>
          <td>Wemos D1 R2</td>
          <td>Servo Slider 0-180 astetta</td>
          <td>Tähän tulee laitteen toiminnon current status</td>
          <td><input id="slider1" type="range" min="0" max="180" step="10" value ="100" /></td>
       </tr>
        <input type="hidden" value=0 name="ohjaus1[]" id="led1">
        <input type="hidden" value=0 name="ohjaus1[]" id="led2">
        <input type="hidden" value=0 name="ohjaus1[]" id="led3">
        <input type="hidden" value=0 name="ohjaus1[]" id="led4">
        <input type="hidden" value=000 name="ohjaus1[]" id="servo1">
    </table>
    
      <table>
      <tr>
     <th>Tähän tulee sensorigraafit </th>
      </tr>
        <tr>                  
          <td>Wemos D1 R2 </td>
          <td>Pinnankorkeussensori</td>
          <td><iframe width="450" height="260" style="border: 1px solid #cccccc;" src="https://thingspeak.com/channels/216434/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=60&title=Et%C3%A4isyys+WeMos&type=line&xaxis=Aika&yaxis=Et%C3%A4isyys"></iframe></td>
        </tr>
        <tr>                  
          <td>Wemos D1 R2</td>
          <td>Lämpötila</td>
          <td>Tähän tulee laitteen toiminnon current status</td>
        </tr>

    </table>
    <table>
      <tr>
     <th>Tähän tulee livestreamit </th>
      </tr>
        <tr>                  
          <td>Raspberry Pi 3 </td>
          <td>Webcam</td>
          <td><img id="img"src="http://86.50.34.16/html/cam_pic.php?1487262360446"></img></td>
        </tr>
        <tr>                  
          <td>Raspberry Pi 3 </td>
          <td> Tähän vos tulla toinen livestream</td>
          <td>Tähän tulee laitteen toiminnon current status</td>
        </tr>

    </table>
<script>
    function submitForm() {
          $.ajax({
           type: "POST",
           url: 'https://wemos-ui-server-r4zz3.c9users.io/kayttoliittyma/kayttis.php',
           data: $("#form").serialize()
         });
      
    }
    
  $('#ON1').click(function() {
    $('#led1').val(1);
    submitForm();
  });
    $('#ON2').click(function() {
    $('#led2').val(1);
    submitForm();
  });
    $('#ON3').click(function() {
    $('#led3').val(1);
    submitForm();
  });
    $('#ON4').click(function() {
    $('#led4').val(1);
    submitForm();
  });
    $('#OFF1').click(function() {
    $('#led1').val(0);
    submitForm();
  });
    $('#OFF2').click(function() {
    $('#led2').val(0);
    submitForm();
  });
    $('#OFF3').click(function() {
    $('#led3').val(0);
    submitForm();
  });
    $('#OFF4').click(function() {
    $('#led4').val(0);
    submitForm();
  });
    $('#SERVO1_0').click(function() {
    $('#servo1').val(000);
    submitForm();
  });
    $('#SERVO1_180').click(function() {
    $('#servo1').val(180);
    submitForm();
  });
    $('#SERVO1_30').click(function() {
    $('#servo1').val(30);
    submitForm();
  });
    $('#SERVO1_150').click(function() {
    $('#servo1').val(150);
    submitForm();
  });
    $('#SERVO1_60').click(function() {
    $('#servo1').val(60);
    submitForm();
  });
    $('#SERVO1_120').click(function() {
    $('#servo1').val(120);
    submitForm();
  });
    $('slider1').click(function() {
    $('#slider1').val(120);
    submitForm();
    });
    
    window.onload = function() {
    var image = document.getElementById("img");

    function updateImage() {
        image.src = image.src.split("?")[0] + "?" + new Date().getTime();
    }

    setInterval(updateImage, 130);
}
  
  </script>
</form>
    
        


  <footer>
    <p>Done by Rasmus Toivanen copyright 2017</p>
  </footer>
</div>
</div>
    </body>
 