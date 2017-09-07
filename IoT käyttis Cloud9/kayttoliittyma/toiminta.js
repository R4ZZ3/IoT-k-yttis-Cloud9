   <script>
    function submitForm() {
          $.ajax({
           type: "POST",
           url: 'https://wemos-ui-server-r4zz3.c9users.io/kayttoliittyma/kayttis.php',
           data: $("#form").serialize()
         }});

    }
  $('#ON').click(function() {
    $('#led1').val(1);
    $('#led2').val(1);
    submitForm();
  });
  $('#stop').click(function() {
    $('#motor1').val(0);
    $('#motor2').val(0);
    submitForm();
  });
      $('#backward').click(function() {
    $('#motor1').val(2);
    $('#motor2').val(2);
    submitForm();
  });
  $('#right').click(function() {
    $('#motor1').val(1);
    $('#motor2').val(2);
    submitForm();
  });
    
  $('#left').click(function() {
    $('#motor1').val(2);
    $('#motor2').val(1); 
    submitForm();
  });
  </script>