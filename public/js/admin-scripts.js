var feat = 1;
function feature_fields() {

  feat++;
  var objTo = document.getElementById('feature_fields')
  var divtest = document.createElement("div");
  divtest.setAttribute("class", "row removeclass-feat"+feat);
  var rdiv = 'removeclass-feat'+feat;
  divtest.innerHTML = '<div class="col-md-5"> <div class="form-group"><label for="namef" class="control-label col-md-3">Titre</label><div class="col-md-9"><input class="form-control" placeholder="" name="featurename[]" type="text"></div></div></div> <div class="col-md-5 width-50"><div class="form-group"><label for="desciptionf" class="control-label col-md-3">Desciption</label><div class="col-md-9"><input class="form-control" placeholder="" name="featuredescription[]" type="text"></div></div></div> <div class="col-md-1"><button class="btn btn-danger" type="button" onclick="remove_feature_fields('+ feat +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div><div class="clear"></div>';
  
  objTo.appendChild(divtest)
}
function remove_feature_fields(rid) {
    $('.removeclass-feat'+rid).remove();
}

var feat = 1;
function maintenance_fields() {
  if( $('#first_component').val() != '' )
  {
    feat++;
    var objTo = document.getElementById('maintenance_fields')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "row removeclass-feat"+feat);
    var rdiv = 'removeclass-feat'+feat;
    divtest.innerHTML = '<div class="col-md-6"> <div class="form-group"><label for="composant" class="control-label col-md-3">Composant</label><div class="col-md-9">' + components_select + '</div></div></div> <div class="col-md-5"><div class="form-group"><label for="comment" class="control-label col-md-3">Commentaire</label><div class="col-md-9"><input class="form-control" placeholder="Commentaire" name="comments[]" type="text"></div></div></div> <div class="col-md-1"><button class="btn btn-danger" type="button" onclick="remove_maintenance_fields('+ feat +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div><div class="clear"></div>';
    objTo.appendChild(divtest);

    // remove selected components from added select
    var components = $('.select2me');
    $.each(components, function (index, item) {
      if(item.value != ''){
        $(".row .removeclass-feat" + feat + " .select2me option[value=" + item.value + "]").remove();
      }
    });
    $('.select2me').select2(); 
  }
}
function remove_maintenance_fields(rid) {
  $('.removeclass-feat'+rid).remove();
}

var geo = 1;
function geometry_fields() {

  geo++;
  var objTo = document.getElementById('geometry_fields')
  var divtest = document.createElement("div");
  divtest.setAttribute("class", "row removeclass-geo"+geo);
  var rdiv = 'removeclass-geo'+geo;
  divtest.innerHTML = '<div class="col-md-5"> <div class="form-group"><label for="namef" class="control-label col-md-3">Titre</label><div class="col-md-9"><input class="form-control" placeholder="" name="geometryname[]" type="text"></div></div></div> <div class="col-md-5 width-50"><div class="form-group"><label for="desciptionf" class="control-label col-md-3">Desciption</label><div class="col-md-9"><input class="form-control" placeholder="" name="geometrydescription[]" type="text"></div></div></div> <div class="col-md-1"><button class="btn btn-danger" type="button" onclick="remove_geometry_fields('+ geo +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div><div class="clear"></div>';
  
  objTo.appendChild(divtest)
}
function remove_geometry_fields(rid) {
    $('.removeclass-geo'+rid).remove();
}
function setColor(color){
  $("#color").attr('value',color);
}
function deleteImage(image_id,type) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
      url: APP_URL + "delete-image",
      type: 'POST',
      dataType: "JSON",
      data: {
        _token: CSRF_TOKEN,
        id: image_id,
        type: type
      },
      success: function( data ) {
        $("#img-"+image_id).remove();
        $("#delete-img-msg").removeClass('hidden');
        $("#delete-img-msg").empty();
        $("#delete-img-msg").append(data);
      }
  });
}

$( "#reference" ).autocomplete({
    source: function( request, response ) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var type = $("#type").val();
        $.ajax({
            url: APP_URL + "get-reference",
            type: 'POST',
            dataType: "JSON",
            data: {
              _token: CSRF_TOKEN,
              q: request.term,
              type: type
            },
            success: function( data ) {
                response( data );
            }
        });
    },
});

$("#checkbox2").click(function() {
  if($('#checkbox2').is(':checked')) {
    $("#rental-prices").removeClass('hidden');
  }else{
    //$("#rental-prices").removeClass('hidden');
    $("#rental-prices").addClass('hidden');
  }
});