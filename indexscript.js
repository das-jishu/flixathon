

    //Ajax Call for the signup form
$("#signupform").submit(function(event) {
    //prevent default php processing
    event.preventDefault();
    //console.log($(this).serializeArray());

    var datatopost = $("#signupform").serializeArray();
    
    //console.log(datatopost);

    $.ajax({
        url: "./signup.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
            if(data)
            {
                console.log("hey");

                $("#message").html(data);
            }
        },
        error: function() {
            $("#message").html("Error");
        }
    });
});

//Ajax Call for the login form
//Once the form is submitted
$("#loginform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to login.php using AJAX
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            /* if(data.length > 7)
            {
                data = data.substring(data.length - 7);
            } */
            if(data.substring(data.length - 7) == "success"){
                window.location = "mainpageloggedin.php";
            }else{
                //console.log(data.trim().length);
                $('#loginmessage').html(data);   
            }
        },
        error: function(){
            $("#loginmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

//Ajax Call for the forgot password form
//Once the form is submitted
$("#forgotpasswordform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to signup.php using AJAX
    $.ajax({
        url: "forgot-password.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            
            $('#forgotpasswordmessage').html(data);
        },
        error: function(){
            $("#forgotpasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

