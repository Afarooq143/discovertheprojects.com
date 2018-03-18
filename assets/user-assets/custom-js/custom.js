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

//$(document).ready(function(){
    function showTab(tab){
      switch(tab){
        case 'Demo-test-one':
          $("#Demo-test-one").show();
          $("#Demo-test-two").hide();
          $("#Demo-test-three").hide();
          $("#Demo-test-four").hide();
          $("#Demo-test-five").hide();
          break
        case 'Demo-test-two':
          $("#Demo-test-one").hide();   
          $("#Demo-test-two").show();
          $("#Demo-test-three").hide();
          $("#Demo-test-four").hide();
          $("#Demo-test-five").hide();
          break
        case 'Demo-test-three':
          $("#Demo-test-one").hide();
          $("#Demo-test-two").hide();
          $("#Demo-test-three").show();
          $("#Demo-test-four").hide();
          $("#Demo-test-five").hide();
          break
        case 'Demo-test-four':
          $("#Demo-test-one").hide();
          $("#Demo-test-two").hide();
          $("#Demo-test-three").hide();
          $("#Demo-test-four").show();
          $("#Demo-test-five").hide();
          break
        case 'Demo-test-five':
          $("#Demo-test-one").hide();
          $("#Demo-test-two").hide();
          $("#Demo-test-three").hide();
          $("#Demo-test-four").hide();
          $("#Demo-test-five").show();
          break
      }
    }


    // $("#next-button-one").click(function(){
    //     $("#Demo-test-two").show("");
    // });
    // $("#next-button-one").click(function(){
    //     $("#Demo-test-one").hide("");
    // });
    
    //  $("#next-button-two").click(function(){
    //     $("#Demo-test-three").show("");
    // });
    // $("#next-button-two").click(function(){
    //     $("#Demo-test-two").hide("");
    // });
    
    //  $("#next-button-three").click(function(){
    //     $("#Demo-test-four").show("");
    // });
    // $("#next-button-three").click(function(){
    //     $("#Demo-test-three").hide("");
    // });
    // $("#next-button-four").click(function(){
    //     $("#Demo-test-five").show("");
    // });
    // $("#next-button-four").click(function(){
    //     $("#Demo-test-four").hide("");
    // });
    
    
    
    // $("#Previous-button-two").click(function(){
    //     $("#Demo-test-one").show("");
    // });
    // $("#Previous-button-two").click(function(){
    //     $("#Demo-test-two").hide("");
    // });
    
    //  $("#Previous-button-three").click(function(){
    //     $("#Demo-test-two").show("");
    // });
    // $("#Previous-button-three").click(function(){
    //     $("#Demo-test-three").hide("");
    // });
    
    //  $("#Previous-button-four").click(function(){
    //     $("#Demo-test-three").show("");
    // });
    // $("#Previous-button-four").click(function(){
    //     $("#Demo-test-four").hide("");
    // });
    //  $("#Previous-button-five").click(function(){
    //     $("#Demo-test-four").show("");
    // });
    // $("#Previous-button-five").click(function(){
    //     $("#Demo-test-five").hide("");
    // });
//});
$("#checkbox-min").click(function(){
      $(".display-none-text").addClass("none").toggle();
});


   $(document).ready(function(){
        // Add minus icon for collapse element which is open by default
        $(".collapse.in").each(function(){
          $(this).siblings(".panel-heading").find(".fa").addClass("fa-caret-right").removeClass("fa-caret-down");
        });
        
        // Toggle plus minus icon on show hide of collapse element
        $(".collapse").on('show.bs.collapse', function(){
          $(this).parent().find(".fa").removeClass("fa-caret-right").addClass("fa-caret-down");
        }).on('hide.bs.collapse', function(){
          $(this).parent().find(".glyphicon").removeClass("fa-caret-down").addClass("glyphicon-plus");
        });





        $('.checkSubUnits').click(function(){
          var index = $(this).attr('id');
          //alert(index);
           $("input:checkbox.subUnits"+index).prop('checked',this.checked);
        });

        // $('#selectAll').click(function(){
        //    var status = this.checked; // "select all" checked status
        //   $('.selectAll').each(function(){ //iterate all listed checkbox items
        //       this.checked = status; //change ".checkbox" checked status
        //   });
        //   //$("input:checkbox.selectAll").prop('checked',this.checked);
        // });



        var clicked = false;
        $("#selectAll").on("click", function() {
          $(".selectAll").prop("checked", !clicked);
          clicked = !clicked;
        });
    });

   $(".menu-ul.one button").click(function(){
        $(".profile").toggle("");
    
    });