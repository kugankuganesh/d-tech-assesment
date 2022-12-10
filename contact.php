<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
 
    <title> Vote for a Teacher</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="style_res.scss">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <style>
            .error{
  color: red;
}
        </style>

    </head>
    <body>
        
        <div class="topnav" id="myTopnav">
        
                
            <a class="logo" href="#home">D Tech (Pvt) Ltd</a>
            <a href="#about"  >About</a>
            <a href="contact.php" class="active">Contact</a>
            <a href="index.html">Vote for a tecaher</a>
            <a><i>
                <div class="b"></div>
                <div class="b"></div>
                <div class="b"></div>
            </i></a>
     
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
          
        </div> 
        
        <div class="container register">
                <div class="row">
                   
                    <div class="col-md-9 register-right">
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Contact form</h3>
                                <form action="signup.php" method="post" id="register-form">
                                <div class="row register-form">
                                    <?php if(isset($_GET['error'])){ ?>
                                    <div class="alert alert-warning" role="alert">
                                        <?php echo $_GET['error']; ?>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="name" id="name" class="form-control" placeholder="Your Name *" 
                                        value="" />

                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control"  id="email" name="email" placeholder="Your Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" id="phone" name="phone" class="form-control" placeholder="Your Phone *" value="" />
                                        </div>
                                        
                                        <div class="form-group">
                                        <div class="form-group">
                                        <input type="password" minlength="10" maxlength="10" id="password" name="password" class="form-control" placeholder="Your Password *" value="" />

                                        </div>                                        </div>
                                        <button onclick="clearfield()" class="btn btn-warning"  type="button" value="Clear">Clear</button>

                                        <button id="submitbtn" class="btn btn-primary" type="button" value="Register">Submit</button>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div id="response">

                                    </div>
                                </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
     
   
        

        
  <script>
    function myFunction() {
var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
} else {
    x.className = "topnav";
}
} 
  </script>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


  <script>

$(document).ready(function() {
   jQuery("#register-form").validate({
      rules: {
         'name': {
            required: true,
            minlength: 2,
         },
         'password': {
            required: true,
            minlength: 8,
         },
         'phone': {
            required: true,
            minlength: 10,
         },
         'email': {
            required: true,
            email: true,
         },
      },
      messages: {
        'name': 'This field is required',
        'phone': 'Enter a valid phone number',
        'email': 'Enter a valid email',
        'password': 'This field is required',
        },
   });
});


    $('#submitbtn').click(function(){

        if($('#register-form').valid()){
            $.ajax({
        type: "POST",
        url: "signup.php",
        data: $('#register-form').serialize(),
        success: function(data)
        {
            var json_res = JSON.parse(data);
            if(json_res.type=='Error'){
                $("#response").html('<div class="alert alert-danger">'+json_res.msg+'</div>');
            }else{
                $("#response").html('<div class="alert alert-success">'+json_res.msg+'</div>');
            }
        }, error: function (jqXHR, exception) {
            $("#response").html('<div class="alert alert-danger">Something went wrong</div>');
        }
    });
        }

    });

    function clearfield(){
        $('#register-form')[0].reset();
        $("#response").html("");
    }
  </script>
    </body>
</html>

