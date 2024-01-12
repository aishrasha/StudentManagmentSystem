
$(document).ready(function() {
    $('#submit').click(function() {
        var name = $('#fname').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var cpassword = $('#cpassword').val();

        
        $('#name_error').text('');
        $('#password_error').text('');
        $('#email_error').text('');
        $('#cpassword_error').text('');

        
        if (!name) {
            $('#name_error').text('Name is Required');
        }
        if (!email) {
            $('#email_error').text('Email is Required');
        }else{
            var emailregexp = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!emailregexp.test(email)){
                $('#email_error').text('Invalid email');
            }
        }
        if (!password) {
            $('#password_error').text('password is Required');
        }
        if (!cpassword) {
            $('#cpassword_error').text('Confirm password is Required');
        }
        if(password != cpassword){
            $('#cpassword_error').text('password doesnt match');
        }
        

    });
});      