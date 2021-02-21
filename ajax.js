//user signup
function check() {

        var name     = $("#name").val();
        var uemail    = $("#email").val();
        var gend     = $("#gender").val();
        var upword    = $("#pword").val();
        var cpword   = $("#cpword").val();
        var tel      = $("#tel").val();

        if (name == null || name == "") {

            $('#msg').html("Kindly input your full name");
        } else {
        if (uemail == null || uemail == "") {

        $('#msg').html("Kindly input your email address");
        } else {

        if (upword == null || upword == "") {

        $('#msg').html("Kindly create a password");
        } else {

        if (cpword == null || cpword == "") {

        $('#msg').html("Confirm your password");
        } else {

        if (upword != cpword) {

        $('#msg').html("Your password doesn`t match");
        } else {

        if (tel == null || tel == "") {

        $('#msg').html("Invalid phone number inputted");    
        } else {

        $('#msg').html("Loading... Please wait");   
        $.ajax
    (
    {
        type        :  'post',
        url         :  'functions/init.php',
        data        :  {name:name,uemail:uemail,gend:gend,upword:upword,cpword:cpword,tel:tel},
        success     :  function(data)
        {
            $('#msg').html(data);
        }
    }
        )
        }
        }
        }
        }
        }
        }
        $("#exampleModalCenter").modal();

    }


//signin
function signin() {

    var email        = $("#email").val();
        var pword        = $("#pword").val();

        if (email == null || email == "") {

        $('#msg').html("Kindly input your email address");      
        } else {

        if (pword == null || pword == "") {

        $('#msg').html("Kindly input your password");       
        } else {

        $('#msg').html("Loading... Please wait");
        
        $.ajax
    (
    {
        type        :  'post',
        url         :  'functions/init.php',
        data        :  {email:email,pword:pword},
        success     :  function(data)
        {
            $('#msg').html(data);
        }
    }
        )       
        }   
        }

    $("#exampleModalCenter").modal();
}

//forgot password  
function forgotpassword() {

        var mail        = $("#email").val();
    
        if (mail == null || mail == "") {

        $('#msg').html("Kindly input your email address");      
        } else {

        $('#msg').html("Loading... Please wait");
        
        $.ajax
    (
    {
        type        :  'post',
        url         :  'functions/init.php',
        data        :  {mail:mail},
        success     :  function(data)
        {
            $('#msg').html(data);
        }
    }
        )         
        }

    $("#exampleModalCenter").modal();
}

//update password
function updatePword() {

        var urpword       = $("#pword").val();
        var ucpword       = $("#cpword").val();
    
        if (urpword == null || urpword == "") {

        $('#msg').html("Kindly create a new password");      
        } else {

        if (ucpword == null || ucpword == "") {

        $('#msg').html("Confirm your password");
        } else {

        if (urpword != ucpword) {

        $('#msg').html("Your password doesn`t match");
        } else {

        $('#msg').html("Loading... Please wait");
        
        $.ajax
    (
    {
        type        :  'post',
        url         :  'functions/init.php',
        data        :  {urpword:urpword,ucpword:ucpword},
        success     :  function(data)
        {
            $('#msg').html(data);
        }
    }
        )         
        }
        }
        }

    $("#exampleModalCenter").modal();
}



//landlord signup
function landlordReg() {

        var lname     = $("#name").val();
        var lemail    = $("#email").val();
        var lgend     = $("#gender").val();
        var lpword    = $("#pword").val();
        var lcpword   = $("#cpword").val();
        var ltel      = $("#tel").val();
        var lbank     = $("#bank").val();
        var lacct     = $("#acct").val();
        var lnin      = $("#nin").val();

        if (lname == null || lname == "") {

            $('#msg').html("Kindly input your full name");
        } else {
        if (lemail == null || lemail == "") {

        $('#msg').html("Kindly input your email address");
        } else {

        if (lpword == null || lpword == "") {

        $('#msg').html("Kindly create a password");
        } else {

        if (lcpword == null || lcpword == "") {

        $('#msg').html("Confirm your password");
        } else {

        if (lpword != lcpword) {

        $('#msg').html("Your password doesn`t match");
        } else {

        if (ltel == null || ltel == "") {

        $('#msg').html("Invalid phone number inputted");    
        } else {

        if (lacct == null || lacct == "") {

        $('#msg').html("Invalid bank account number inputted");    
        } else {    

        $('#msg').html("Loading... Please wait");   
        $.ajax
    (
    {
        type        :  'post',
        url         :  'functions/init.php',
        data        :  {lname:lname,lemail:lemail,lgend:lgend,lpword:lpword,lcpword:lcpword,ltel:ltel,lbank:lbank,lacct:lacct,lnin:lnin},
        success     :  function(data)
        {
            $('#msg').html(data);
        }
    }
        )
        }
        }
        }
        }
        }
        }
        }
        $("#exampleModalCenter").modal();

    }


//agent signup
function agtReg() {

        var aname     = $("#name").val();
        var aemail    = $("#email").val();
        var agend     = $("#gender").val();
        var apword    = $("#pword").val();
        var acpword   = $("#cpword").val();
        var atel      = $("#tel").val();
        var abank     = $("#bank").val();
        var aacct     = $("#acct").val();
        var anin      = $("#nin").val();
        var agtbn     = $("#agtbn").val();

        if (aname == null || aname == "") {

            $('#msg').html("Kindly input your full name");
        } else {
        if (aemail == null || aemail == "") {

        $('#msg').html("Kindly input your email address");
        } else {

        if (apword == null || apword == "") {

        $('#msg').html("Kindly create a password");
        } else {

        if (acpword == null || acpword == "") {

        $('#msg').html("Confirm your password");
        } else {

        if (apword != acpword) {

        $('#msg').html("Your password doesn`t match");
        } else {

        if (atel == null || atel == "") {

        $('#msg').html("Invalid phone number inputted");    
        } else {

        if (aacct == null || aacct == "") {

        $('#msg').html("Invalid bank account number inputted");    
        } else {    

        $('#msg').html("Loading... Please wait");   
        $.ajax
    (
    {
        type        :  'post',
        url         :  'functions/init.php',
        data        :  {aname:aname,aemail:aemail,agend:agend,apword:apword,acpword:acpword,atel:atel,abank:abank,aacct:aacct,anin:anin,agtbn:agtbn},
        success     :  function(data)
        {
            $('#msg').html(data);
        }
    }
        )
        }
        }
        }
        }
        }
        }
        }
        $("#exampleModalCenter").modal();

    }


 //apartment filter
 function filterApt() {

        var aprmt     = $("#aprmt").val();
        var loc       = $("#loc").val();
        var price     = $("#price").val();
        var toi       = $("#toi").val();
        var wat       = $("#water").val();

        window.location.href = "./filterapt?apr="+aprmt+"&loc="+loc+"&prc="+price+"&toi="+toi+"&wat="+wat;

 }

 //pay from wallet
 function allPayme() {

        var drt       = $("#drt").val();
        var all       = $("#all").val();
        var upl       = $("#upl").val();
        var trpwod    = $("#trpword").val();

        if (trpwod == "" || trpwod == null) {

            $('#msg').html("Kindly input your password to complete this transaction"); 

        } else {

        $('#msg').html("Loading... Please wait"); 
        
                $.ajax
    (
    {
        type        :  'post',
        url         :  'functions/init.php',
        data        :  {drt:drt,all:all,upl:upl,trpwod:trpwod},
        success     :  function(data)
        {
            $('#msg').html(data);
        }
    }
        )

    $("#exampleModalCenter").modal();
 }
}


//pay from online wallet
function allonlPayme() {

        var onldrt       = $("#drt").val();
        var onlall       = $("#all").val();
        var onlupl       = $("#upl").val();
        var onltrpwod    = $("#trpword").val();

        if (onltrpwod == "" || onltrpwod == null) {

            $('#msg').html("Kindly input your password to complete this transaction"); 

        } else {

        $('#msg').html("Loading... Please wait"); 
        
                $.ajax
    (
    {
        type        :  'post',
        url         :  'functions/init.php',
        data        :  {onldrt:onldrt,onlall:onlall,onlupl:onlupl,onltrpwod:onltrpwod},
        success     :  function(data)
        {
            $('#msg').html(data);
        }
    }
        )

    $("#exampleModalCenter").modal();
 }
}