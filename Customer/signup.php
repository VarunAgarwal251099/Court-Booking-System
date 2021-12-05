<?php require_once 'header.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <span id="help"></span>
      <br>
      <br>
      <h4>Signup into The Paddler Sport</h4>
      <br>
      <form class="" action="" method="post">
        <div class="form-group">
          <i class="fa fa-envelope"></i><label for="">&nbsp;Email</label>
          <input type="email" name="email" id="email" value="" class="form-control" placeholder="Enter email">
          <span id="email-help"></span>
        </div>
        <div class="form-group">
          <i class="fa fa-key"></i><label for="">&nbsp;Password</label>
          <input type="password" name="password" id="password" value="" class="form-control" placeholder="Enter password" >
          <span id="pass-help"></span>
        </div>
        <div class="form-group">
          <i class="fa fa-key"></i><label for="">&nbsp;Confirm Password</label>
          <input type="password" name="cpassword" id="cpassword" value="" class="form-control" placeholder="Confirm password" >
          <span id="cpass-help"></span>
        </div>
        <div class="form-group">
          <i class="fa fa-user"></i><label for="">&nbsp;Name</label>
          <input type="text" name="name" value="" id="name" class="form-control" placeholder="Enter full name" >
          <span id="name-help"></span>
        </div>
        <div class="form-group">
          <i class="fas fa-mobile-alt"></i><label for="">&nbsp;Mobile</label>
          <input type="text" name="mobile" value="" id="mobile" class="form-control" placeholder="Enter Mobile number" >
          <span id="mob-help"></span>
        </div>
        <div class="form-group">
          <button type="button" id="submit" name="submit"  class="btn btn-success" style="width: 100%;background: green;">Signup</button>
        </div>
      </form>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>
<?php include_once 'footer.php'; ?>

<script type="text/javascript">
  $(document).ready(function(){
    var validname = false;
    var validpass = false;
    var validcnfpass = false;
    var validemail = false;
    var validmob = false;
    var email ="";
    var password="";
    var cpassword="";
    var name="";
    var mobile="";

    $('#email').blur(function(){
      email = $(this).val();
      var regex = /^\w+[\w\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/;
      if (email=="" || email== null) {
        $('#email-help').css("color","red");
        $('#email-help').html('&#10005; please enter email');

      }else {
        if (!regex.test(email)) {
          $('#email-help').css("color","red");
          $('#email-help').html('&#10005; invalid email address');

        }else {
          $.ajax({
            url: 'email_check.php',
            method: 'post',
            data: {email:email},
            dataType: "text",
            success:function(data){
            if (data==1) {
              $('#email-help').css("color","red");
              $('#email-help').html('&#10005; email already exists');

            }else {
              $('#email-help').css("color","green");
              $('#email-help').html('&#10003; valid email address');
                validemail = true;

            }
            }
          });
        }
      }
    });
    $('#password').blur(function(){
      password = $(this).val();
      if (password=="" || password==null) {
        $('#pass-help').css("color","red");
        $('#pass-help').html('&#10005; please enter password');

      }else if (password.length<5) {
        $('#pass-help').css("color","red");
        $('#pass-help').html('&#10005; password must be more than 4 characters');

      }else{
        $('#pass-help').css("color","green");
        $('#pass-help').html('&#10003; valid password');
         validpass = true;
      }
    });
    $('#cpassword').blur(function(){
      cpassword = $(this).val();
      if (cpassword=="" || cpassword==null) {
        $('#cpass-help').css("color","red");
        $('#cpass-help').html('&#10005; please confirm password');

      }else if ((password != cpassword) || (cpassword.length<5)) {
        $('#cpass-help').css("color","red");
        $('#cpass-help').html('&#10005; please confirm password');

      }else{
        $('#cpass-help').css("color","green");
        $('#cpass-help').html('&#10003; password matched');
          validcnfpass = true;
      }
    });
    $('#name').blur(function(){
      name = $(this).val();
      var regex = /^[a-zA-Z ]+$/;
      if (name=="" || name==null) {
        $('#name-help').css("color","red");
        $('#name-help').html('&#10005; please enter name');

      }else if (!regex.test(name)) {
        $('#name-help').css("color","red");
        $('#name-help').html('&#10005; only alphabets and spaces are allowed');

      }else{
        $('#name-help').css("color","green");
        $('#name-help').html('&#10003; valid name');
           validname = true;
      }
    });
    $('#mobile').blur(function(){
      mobile = $(this).val();
      var regex = /^[6-9]\d{9}$/;
      if (mobile=="" || mobile==null) {
        $('#mob-help').css("color","red");
        $('#mob-help').html('&#10005; please enter mobile number');

      }else if (!regex.test(mobile)) {
        $('#mob-help').css("color","red");
        $('#mob-help').html('&#10005; invalid mobile number');

      }else{
        $.ajax({
          url: 'mobile_check.php',
          method: 'post',
          data: {mobile:mobile},
          dataType: "text",
          success:function(data){
          if (data==1) {
            $('#mob-help').css("color","red");
            $('#mob-help').html('&#10005; mobile number already exists');

          }else {
            $('#mob-help').css("color","green");
            $('#mob-help').html('&#10003; valid mobile number');
              validmob = true;

          }
          }
        });
      }
    });
    $('#submit').click(function(){
      if (validemail==false || validpass==false || validcnfpass==false || validname==false || validmob==false) {
        $('#help').html('<div class="alert alert-danger">Fill all fields correctly</div>');
        window.setTimeout(function(){
          $('.alert').fadeTo(500,0).slideUp(500,function(){
            $(this).remove();
          });
        },1000);
      }else {
        $.ajax({
          url: 'signuphandler.php',
          method: 'post',
          data: {email:email,password:password,name:name,mobile:mobile},
          dataType: "text",
          success:function(data){
           $('#help').html(data);
            window.setTimeout(function(){
              window.location.href='index.php';
            },2000);
          }
        });
      }
    });

  });


</script>
</body>
</html>
