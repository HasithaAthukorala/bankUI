
(function ($) {
    "use strict";
    
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        // for(var i=0; i<input.length; i++) {
        //     if(validate(input[i]) == false){
        //         showValidate(input[i]);
        //         check=false;
        //     }
        // }


        if(check = true){

            $.ajax({
                url: "../ajax/customer_login.php",
                data:{'username': $(input[0]).val().toString(),'password': $(input[1]).val().toString()},
                type:"post",
                success:function (data) {
                    alert(data);
                    if(data = 0)
                    {
                        alert("dfdaa");
                        toast({
                            type: 'error',
                            title: 'Incorrect Login Details!'
                        })

                    }else {
                        alert("sdgwvwb");
                        // let timerInterval;
                        // swal({
                        //     title: 'Successfully Logged In!',
                        //     html: 'You will be redirected in <strong></strong> seconds.',
                        //     timer: 4000,
                        //     onOpen: () => {
                        //         swal.showLoading()
                        //         timerInterval = setInterval(() => {
                        //             swal.getContent().querySelector('strong')
                        //                 .textContent = Math.round(swal.getTimerLeft()/1000)
                        //         }, 1000)
                        //     },
                        //     onClose: () => {
                        //         clearInterval(timerInterval)
                        //     }
                        // }).then(function () {
                        //     window.location = "dashboard.php";
                        // });

                    }
                }
            })
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);