//for adding inputs to course categories
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">'+
                                 '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 pull-left">'+
                                    '<div class="form-group">'+
                                          '<label for="categoryName">Category Name<span class="text-danger">*</span></label>'+
                                          '<input id="categoryName" name="category_name[]" type="text" placeholder="Category Name (eg. Part 1, Subject Name, Paper Name)" required class="form-control" value="">'+
                                      
                                            '<label for="categoryName">Remove</label><br>'+
                                             '<button class="btn btn-danger remove_field"><i class="fa fa-times"></i></button>'+
                                          '</div>'+
                                      '</div>'+
                                  '</div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});

//for adding inputs to units 
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_subunit_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">'+
                                 '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 pull-left">'+
                                    '<div class="form-group">'+
                                          '<label for="subunitName">Sub Unit<span class="text-danger">*</span></label>'+
                                          '<input id="subunitName" name="subunit_name[]" type="text" placeholder="Sub Unit" required class="form-control" value="">'+
                                      
                                            '<label for="subunitName">Remove</label><br>'+
                                             '<button class="btn btn-danger remove_subunit"><i class="fa fa-times"></i></button>'+
                                          '</div>'+
                                      '</div>'+
                                  '</div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_subunit", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});





function getType(v){
	$.ajax({
        url: "getQuestionType",
        type: "POST",
        data: 'id='+v ,
        success: function (response) {
          // console.log(response);
          if(response){
           	var data =JSON.parse(response);
           		var html = '<option>Select</option>';
           		jQuery.each(data, function( i, val ) {
				 	      html +='<option value="'+val.id+'">'+val.category_name+'</option>';
				      });
           		$('#category_id').html(html);
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}


function checkValue(v){
  if($('#'+v+'').val() == ''){
    alert('This field is empty. Please choose other');
    $('#answer').val('');
    return false;
  }
}


function getQuestionDetails(id){
  $.ajax({
        url: "getQuestionDetails",
        type: "POST",
        data: 'id='+id ,
        success: function (response) {
           console.log(response);
          if(response){
            $('#questionDetails').html('');
            var data =JSON.parse(response);
            console.log(data.id);
            var answer = '';
            switch(data.answer){
              case 'option_a':
                answer = 'Option A: '+data.option_a;
              break;
              case 'option_b':
                answer = 'Option B: '+data.option_b;
              break;
              case 'option_c':
                answer = 'Option C: '+data.option_c;
              break;
              case 'option_d':
                answer = 'Option D: '+data.option_d;
              break;
              case 'option_e':
                answer = 'Option E: '+data.option_e;
              break;
            }
            var html='<table class="table table-responsive-xl table-striped">'+
                        '<tbody>'+
                        '<tr><th scope="row">Question Type</th><td>'+data.question_type+'</td></tr>'+
                        '<tr>'+
                          '<th scope="row">Question</th>'+
                          '<td>'+data.question+'</td>'+
                        '</tr>'+
                        '<tr>'+
                          '<th scope="row">Option A</th>'+
                          '<td>'+data.option_a+'</td>'+
                        '</tr>'+
                        '<tr>'+
                          '<th scope="row">Option B</th>'+
                          '<td>'+data.option_b+'</td>'+
                        '</tr>';
                        
                        if(data.option_c !=''){
                        html+='<tr>'+
                          '<th scope="row">Option C</th>'+
                          '<td>'+data.option_c+'</td>'+
                        '</tr>';
                        }
                        if(data.option_d !=''){
                          html+='<tr>'+
                            '<th scope="row">Option D</th>'+
                            '<td>'+data.option_d+'</td>'+
                          '</tr>';
                        }
                        if(data.option_e !=''){
                          html+='<tr>'+
                            '<th scope="row">Option E</th>'+
                            '<td>'+data.option_e+'</td>'+
                          '</tr>';
                        }

                        html+='<tr>'+
                          '<th scope="row">Explaination</th>'+
                          '<td>'+data.explaination+'</td>'+
                        '</tr>'+
                        '<tr>'+
                          '<th scope="row">Answer</th>'+
                          '<td>'+answer+'</td>'+
                        '</tr>'+
                        '</tbody>'+
                  '</table>';
                   $('#questionDetails').html(html);
          }
        }
        ,
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}


function getTestDetails(id){
  $.ajax({
        url: "getTestDetails",
        type: "POST",
        data: 'id='+id ,
        success: function (response) {
           console.log(response);
          if(response){
              var data =JSON.parse(response);
              var html = '<table class="table table-responsive-xl table-striped">'+
                        '<thead>'+
                        '<tr>'+
                          '<th scope="col">#</th>'+
                          '<th scope="col">Question Type</th>'+
                          '<th scope="col">Question</th>'+
                          '<th scope="col">Answer</th>'+
                          '<th scope="col">Created On</th>'+
                        '</tr>'+
                        '</thead>'+
                        '<tbody>';
                        var sn=1;
                          jQuery.each(data, function( i, val ) {
                            var answer = '';
                            switch(val.answer){
                              case 'option_a':
                                answer = val.option_a;
                              break;
                              case 'option_b':
                                answer = val.option_b;
                              break;
                              case 'option_c':
                                answer = val.option_c;
                              break;
                              case 'option_d':
                                answer = val.option_d;
                              break;
                              case 'option_e':
                                answer = val.option_e;
                              break;
                            }
                            html +='<tr>'+
                                    '<th scope="row">'+sn+'</th>'+
                                    '<td style="width: 20%">'+val.question_type+'</td>'+
                                    '<td style="width: 40%">'+val.question+'</td>'+
                                    '<td>'+answer+'</td>'+
                                    '<td>'+val.created_at+'</td>'+
                                  '</tr>';
                            sn++;
                          });
                        html +='</tbody>'+
                      '</table>';

                $('#questionDetails2').html(html);
          }
        }
        ,
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}

$(document).ready(function(){
  $('.categories').change(function(){
    var course_id = $('#course_id').val();
    var category_id= $(this).val();

    $.ajax({
          url: "getQuestions",
          type: "POST",
          data: 'course_id='+course_id+'&category_id='+category_id ,
          success: function (response) {
             console.log(response);
            if(response){
              var data =JSON.parse(response);
              var html = '<table class="table table-responsive-xl table-striped">'+
                        '<thead>'+
                        '<tr>'+
                          '<th scope="col"><input id="checkAll" name="" type="checkbox"> #</th>'+
                          '<th scope="col">Question Type</th>'+
                          '<th scope="col">Question</th>'+
                          '<th scope="col">Answer</th>'+
                          '<th scope="col">Created On</th>'+
                        '</tr>'+
                        '</thead>'+
                        '<tbody>';
                        var sn=1;
                          jQuery.each(data, function( i, val ) {
                            var answer = '';
                            switch(val.answer){
                              case 'option_a':
                                answer = val.option_a;
                              break;
                              case 'option_b':
                                answer = val.option_b;
                              break;
                              case 'option_c':
                                answer = val.option_c;
                              break;
                              case 'option_d':
                                answer = val.option_d;
                              break;
                              case 'option_e':
                                answer = val.option_e;
                              break;
                            }
                            html +='<tr>'+
                                    '<th scope="row"><input name="question[]" class="allQuestions" value="'+val.id+'" type="checkbox"> '+sn+'</th>'+
                                    '<td style="width: 20%">'+val.question_type+'</td>'+
                                    '<td style="width: 40%">'+val.question+'</td>'+
                                    '<td>'+answer+'</td>'+
                                    '<td>'+val.created_at+'</td>'+
                                  '</tr>';
                            sn++;
                          });
                        html +='</tbody>'+
                      '</table>';

                $('.questions').html(html);

                $("#checkAll").click(function () {
                  $(".allQuestions").prop('checked', $(this).prop('checked'));
                });
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
             console.log(textStatus, errorThrown);
          }
      });

  });



});
/* Function to check all permissions for user groups  form page */
// $(document).ready(function () {
   
// });


$('.deleteConfirm').click(function(){
  var message = 'Are you sure to delete the record ..!';
  var link = this;
  $('<div></div>')
        .appendTo('body')
          .html('<div><h6>'+message+'?</h6></div>')
          .dialog({
              modal: true, 
              title: 'Delete message', 
              zIndex: 10000, 
              autoOpen: true,
              width: 'auto', 
              resizable: false,
              buttons: {
                  Yes: function () {
                     $(this).dialog("close");
                     window.location = link.href;
                  },
                  No: function () {  
                    $(this).dialog("close");
                    return false;
                  }
              },
              close: function (event, ui) {
                  $(this).remove();
              }
          });
          return false;
});


 