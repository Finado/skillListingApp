$('#hideforgot').hide();
$('#myModalLabel2').hide()
$('#forgot').click(function(){
    $('#hideforgot').show(1000);
    $('#loginForm').hide(1000);
    $('#myModalLabel2').show(1000)
    $('#myModalLabel').hide(1000)


})

$('#loger').click(function(){
    $('#hideforgot').hide();
    $('#loginForm').show(1000);
    $('#myModalLabel2').hide(1000)
    $('#myModalLabel').show(1000)


})