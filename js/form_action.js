$('document').ready(function(){


    // registration
    $('#register_form').submit(function(e){
        e.preventDefault()
        let data = $(this).serialize()
        let action = 'function.php'

        $.ajax({
            url: action,
            data: data,
            type: 'POST',
            success: (result=>{

                if(!result.error){
                    $('.register_response').html(result)
                    
                }
            })
        })
    })



    // login
    $('#login_form').submit(function(e){
        e.preventDefault()
        let data = $(this).serialize()
        let action = 'function.php'

        $.ajax({
            url: action,
            data: data,
            type: 'POST',
            success: (result=>{

                if(!result.error){
                    $('.login_response').html(result)
                    
                }
            })
        })
    })



    // forgot 
    $('#forgot_form').submit(function(e){
        e.preventDefault()

        let data = $(this).serialize()
        let action = 'function.php'

        $.ajax({
            url: action,
            data: data,
            type: 'POST',
            success: (result=>{

                if(!result.error){
                    $('.forgot_response').html(result)           
                }
            })
        })


    })




    $('#reset_form').submit(function(e){
        e.preventDefault()

        let data = $(this).serialize()
        let action = 'function.php'

        $.ajax({
            url: action,
            data: data,
            type: 'POST',
            success: (result=>{

                if(!result.error){  
                    setTimeout( ()=>{
                        $('.login_interface').fadeIn('slow');  
                        $('.register_interface').css('display','none');
                        $('.forgot_interface').css('display','none');
                        $('.reset_interface').css('display','none');
                        $('.login_response').html("<span class='alert alert-success'>Login now :)</span>")  
                        window.history.pushState("Sign in/up", "", "index.php" );
                    }, 3000)
                }
            })
        })


    })


})