<?php 
include  __DIR__ .'/header.php';
?>


<div class="container my-5 h-100" style="background-color: #F5F5F5">
  <div class="row h-100 justify-content-center align-items-center" >
    <div class="col-5 text-center">
        
        <h2 class="blue-text my-4">Application</h2>
        <div id="errors-container"></div>
        <div id="success-container"></div>

            <div class="form-group my-3">
                <input type="name" class="form-control" id="name" placeholder="Name" name="name"><?=$customer['name'] ?>
            </div>
            <div class="form-group my-3">
            <input type="name" class="form-control" id="lastName" placeholder="Last name" name="lastName"><?=$customer['lastName'] ?>
            </div>
             <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email"><?=$customer['email'] ?>
            </div>
            <div class="form-group my-3">
            <input type="tel" class="form-control" id="phone" placeholder="Phone" name="phone"><?=$customer['phone'] ?>
             </div>

            <button class="btn btn-lg btn-outline-primary btn-block" id="btn" type="submit">Submit</button>
        </div>
    </div>

</div>
</div>
<script>
    $('button#btn').on('click',function(){
       $("#success-container").html('');
       $("#errors-container").html('');
         var nameValue = $('input#name').val();
         var lastNameValue = $('input#lastName').val();
         var emailValue = $('input#email').val();
         var phoneValue = $('input#phone').val();
  $.ajax({
                url: "/send",
                type: "POST",
                data: {name:nameValue,lastName:lastNameValue, email:emailValue, phone:phoneValue},
                    cache: false,
                success: function(responce){
                    var responce_arr = JSON.parse(responce);
                    if (responce_arr['status'] == "ok") {
                      var datas = responce_arr['data'];
                      var successDiv = '<div class="alert alert-success" role="alert">'+'Your application is accepted: name- '+datas['name']+', last name- '+datas['lastName']+', email- '+datas['email']+', phone- '+datas['phone']+'</div>';
                        $("#success-container").append(successDiv);

                    } 
                    else if(responce_arr['status'] == "error") {
                      var errors = responce_arr['errors'];
                        errors.forEach (function(error){
                        var errorDiv = '<div class="alert alert-danger" role="alert">' + error + '</div>';
                         $("#errors-container").append(errorDiv);

                        });
                    }
                }
            });
        });
</script>
</body>
</html>