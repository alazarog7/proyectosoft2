$(document).ready(function(){
   $('.vigencia').click(function(){
       console.log(this);
   });
   $('#gpass').click(function(){
       var r = Math.random().toString(36).substring(7);
       $('input[name=PASSWORD]').attr("value",r);
   });

});