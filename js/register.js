function validateSignup(){
  //$(document).ready(function(){
    var name = $('#name').val().trim();
    var mobile = $('#mobile').val().trim();
    var email = $('#email').val().trim();
    var pass  = $('#password').val().trim();

    var checkName = /^[a-zA-Z]/.test(name);
    var checkMobile = /^\d{10}$/.test(mobile);
    var checkEmail = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/.test(email);
    // /^[a-z]+[0-9]+(@).[a-z]+$/
    var checkPass = /^[A-Z][a-z 0-9 @$%#~?><>]/.test(pass);

    if(!checkName || name == ''){
      alert('Name must contain alphabets only');
    }

    if(!checkMobile || mobile == ''){
      alert('Enter Correct Mobile Number');
    }

    if(!checkEmail || eamil == ''){
      alert('Enter Correct Email');
    }

    if(!checkPass || pass == ''){
      alert('Enter Correct Password');
    }
  //});


}