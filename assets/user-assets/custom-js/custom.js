$(".images-menu").click(function(){
    $(".images-Access-mina").toggle();
});
$('#country').change(function(){
  var v = $(this).val();
  $.ajax({
        url: "index.php/ftcuser/getStates",
        type: "POST",
        data: 'id='+v ,
        success: function (response) {
           console.log(response);
          if(response){
            var data =JSON.parse(response);
              var html = '<option>Select State</option>';
              jQuery.each(data, function( i, val ) {
                html +='<option value="'+val.id+'">'+val.name+'</option>';
              });
              $('#state_id').html(html);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
});

$(document).ready(function(){
    $(".Cancel-next.External-f-inner button").click(function(){
        $(".display-none-text").toggle();
    });
});

$(document).ready(function(){
  alert('dfdf');
    $("#next-button-one").click(function(){
        $("#Demo-test-two").show("");
    });
    $("#next-button-one").click(function(){
        $("#Demo-test-one").hide("");
    });
    
     $("#next-button-two").click(function(){
        $("#Demo-test-three").show("");
    });
    $("#next-button-two").click(function(){
        $("#Demo-test-two").hide("");
    });
    
     $("#next-button-three").click(function(){
        $("#Demo-test-four").show("");
    });
    $("#next-button-three").click(function(){
        $("#Demo-test-three").hide("");
    });
    $("#next-button-four").click(function(){
        $("#Demo-test-five").show("");
    });
    $("#next-button-four").click(function(){
        $("#Demo-test-four").hide("");
    });
    
    
    
    $("#Previous-button-two").click(function(){
        $("#Demo-test-one").show("");
    });
    $("#Previous-button-two").click(function(){
        $("#Demo-test-two").hide("");
    });
    
     $("#Previous-button-three").click(function(){
        $("#Demo-test-two").show("");
    });
    $("#Previous-button-three").click(function(){
        $("#Demo-test-three").hide("");
    });
    
     $("#Previous-button-four").click(function(){
        $("#Demo-test-three").show("");
    });
    $("#Previous-button-four").click(function(){
        $("#Demo-test-four").hide("");
    });
     $("#Previous-button-five").click(function(){
        $("#Demo-test-four").show("");
    });
    $("#Previous-button-five").click(function(){
        $("#Demo-test-five").hide("");
    });
});
$("#checkbox-min").click(function(){
      $(".display-none-text").addClass("none").toggle();
});


  