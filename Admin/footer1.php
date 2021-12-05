<footer class="footer">
  <p>Copyright &copy; SNB 2021.All Rights Reserved</p>
</footer>
<script type="text/javascript">

  $(document).ready(function(){
    $(".login").click(function(event){
      event.stopPropagation();
      event.stopImmediatePropagation();
      $("#LoginModal").modal("show");
      return false;
    });
    $('#login').click(function(){
      var username = $('#username').val();
      var password = $('#password').val();
      if(username == '' || password == '')
      {
        $('#help').html("both fields are required");
      }else{
        $.ajax({
          url: "loginprocess.php",
          method: "post",
          dataType: "text",
          data:{username:username,password:password},

          success: function(msg){
            if(msg==1)
            {
              window.location.href = window.location.href;
            }else{
              $('#help').html("invalid username or password")
            }

          }
        });
      }

    });






});
</script>
</body>
</html>
