// signin validation
$(document).ready(function(){

    $('#signinform').validate({
        rules:{
            email:"required",
            password:{
                required:true,
                minlength:8,
            }
        },
        messages:{
            email:"this field is required",
            password:{
                required:"this field is required",
                minlength:"Password must be at least {0} characters long",
            }
        },
        errorPlacement: function(error, element){
            if(element.parent().hasClass(".error")){
                error.insertAfter(element.parent())
            } else {
                error.insertAfter(element);
            }
        }

    });
});


// signup

$(document).ready(function(){

    $('#signupform').validate({
        rules:{
            username:"required",
            password:{
                required:true,
                minlength:8,
            },
            email:{
                required:true,
                email:true,
            }
        },
        messages:{
            username:"this field is required",
            password:{
                required:"this field is required",
                minlength:"Password must be at least {0} characters long",
            },
            email:{
                required:"this field is required",
                email:"please enter a valid email address",
            }
        },
        errorPlacement: function(error, element){
            if(element.parent().hasClass("error")){
                error.insertAfter(element.parent())
            } else {
                error.insertAfter(element);
            }
        }

    });
});
