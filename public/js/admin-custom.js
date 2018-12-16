function setCurrency() {
  
  var devise_id = $('#current_currency').val();
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
      url: APP_URL + "set-currency",
      type: 'POST',
      dataType: "JSON",
      data: {
        _token: CSRF_TOKEN,
        id: devise_id
      },
      success: function( data ) {
        $("#set-currency-msg").removeClass('hidden');
        $("#set-currency-msg").empty();
        $("#set-currency-msg").append(data);
      }
  });
}

function getStock() 
{
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 
  var transaction = $("#transaction").val();
  var type = $("#type").val();
  var typeElement = $("#typeElement").val();
  var size = $("#size").val();
  var typeBike = $("#typeBike").val();
  var category = $("#category").val();
  var brand = $("#brand").val();
  var reference = $("#reference").val();

  var start_date = "";
  var end_date = "";

  if(transaction == 'rent'){
    var start_date = $("#start_date_rent").val();
    var end_date = $("#end_date_rent").val();
    if(!start_date || !end_date){
      toastr.error('Vous devez choisir la date de départ et la date d\'arrivé');
      return false;
    }else if(start_date > end_date || start_date == end_date){
      toastr.error('la date de depart doit etre supérieur à la date d\'arrive');
      return false;
    }
  }

  var dataString = {
      _token:CSRF_TOKEN,
      type:type,
      size:size,
      typeElement:typeElement,
      category:category,
      brand:brand,
      reference:reference,
      transaction:transaction,
      start_date:start_date,
      end_date:end_date
    }
    
    $.ajax({
      url: APP_URL + "get-stock",
      type: 'POST',
      data:dataString,
      success: function( data ) {

        //$('#qte_disponible_'+transaction).empty();
        //$('#qte_alert_'+transaction).empty();
        //$('#qte_disponible_'+transaction).append(data['stock']['available_qte']);
        //$('#qte_alert_'+transaction).append(data['stock']['qte_alert']);
        $('#bikes_table_'+transaction+' > tbody').empty();
        var html = "";
        var transaction_value = '"'+transaction+'"';
        $.each(data['bikes'],function(i,value){
          html += "<tr class='odd gradeX'>"+
                
            "<td>"+value['reference']+"</td>"+
            
            "<td>"+value['title']+"</td>"+
            
            "<td>"+value['brand']+"</td>"+
            
            "<td>"+value['category']+"</td>"+

            "<td>"+value['type']+"</td>";

            html += ( type == 'bike' ) ? "<td>"+value['size']+"</td>" : '';

            html += "<td>"+value['color']+"</td>";

            if(transaction == 'rent'){

              html+= "<td>"+value['rent_price']+"</td>";

              html += "<td>"+
                          "<table class='table table-striped table-bordered '>"+
                            "<tr>"+
                              "<th>Jours</th>"+
                              "<th>Prix</th>"+
                            "</tr>";
                            $.each(data['rentalPrices'][value['id']],function(j,values){
                              html += "<tr>"+
                                        "<td>"+values['days']+"</td>"+
                                        "<td>"+values['price']+"</td>"+
                                      "</tr>";
                            });
                          html += "</table>"+
                      "</td>";
            }else{

              html += "<td>"+value['buying_price']+"</td>"+

                      "<td>"+value['sale_price']+"</td>";
            }
            html += "<td><a href='javascript:;' onclick='addToBasket("+transaction_value+","+value['id']+")' class='btn btn-success' ><i class='fa fa-plus'></i></a></td>";
        });

        $('#bikes_table_'+transaction+' > tbody').append(html);
      }
    });

}

function newGetStock() 
{
  $('#form_get_stock').submit();
}

function addToBasket(transaction,id) {

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var type = $("#type").val();
  var transaction_value = $("#transaction").val();
  var start_date = $("#start_date_rent").val();
  var end_date = $("#end_date_rent").val();
  var dataString = {_token:CSRF_TOKEN,id:id,type:type,transaction:transaction_value,start_date:start_date,end_date:end_date};

  $.ajax({
    url: APP_URL + "add-to-basket",
    type: 'POST',
    dataType: "JSON",
    data: dataString,
    success: function( data ) {
      if(data['code'] ==  200){
        $('#basket').empty();
        $('#basket').append(data['count']);
        var div = $("div");
        toastr.success(data['message']);
        $( "#basket" ).animate({opacity: '0.2'}, "fast");
        $( "#basket" ).animate({opacity: '1'}, "fast");
      }else{
        toastr.error(data['message']);
      }
    }
  });
}

function calculateTotal(value, id) {
  var qte = value;
  var price = $("#checkout-price-"+id).val();
  var currency = $("#currency").text();
  var total =  (qte * price);
  $("#checkout-total-"+id).empty();
  $("#checkout-total-"+id).val(total);
  $("#checkout-total-label-"+id).text(total+' '+currency);
  $(".checkout-ttc").empty();

  var sum = 0;
  $('.checkout-total').each(function(){
      sum += parseFloat($(this).val()); 
  });
  $("#checkout-ttc").text(sum+' '+currency);
}

function calculateTotalBasket(qte, row_id) 
{
  var qte = qte;
  var price = $("#checkout-price-"+row_id).val();
  var currency = $("#currency").text();
  var total =  (qte * price);
  $("#checkout-total-"+row_id).empty();
  $("#checkout-total-"+row_id).val(total);
  $("#checkout-total-label-"+row_id).text(total+' '+currency);
  $(".checkout-ttc").empty();

  var sum = 0;
  $('.checkout-total').each(function(){
      sum += parseFloat($(this).val()); 
  });

  $("#checkout-ttc").text(sum+' '+currency);
}

function reCalculate() {
  var currency = $("#currency").text();
  var sum = 0;
  $('.checkout-total').each(function(){
      sum += parseFloat($(this).val()); 
  });
  $("#checkout-ttc").text(sum+' '+currency);
}

function removeItem(typeElement, transaction, elementId, row_id) {
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');;

  var dataString = {
    _token : CSRF_TOKEN,
    typeElement : typeElement,
    transaction : transaction,
    elementId : elementId
  };
  
  $.ajax({
    url: APP_URL + "remove-item-basket",
    type: 'POST',
    dataType: "JSON",
    data:dataString,
    success: function( data ) {
      if(data['code'] ==  200){
        var row = $("#row-id-"+ row_id).remove();
        $('#basket').empty();
        $('#basket').append(data['count']);

        if( data['count'] == 0 )
        {
          $('#btn-chekout').hide();
        }

        toastr.success(data['message']);
        $( "#basket" ).animate({opacity: '0.2'}, "fast");
        $( "#basket" ).animate({opacity: '1'}, "fast");
        reCalculate();
      }else{
        toastr.error(data['message']);
      }
    }
  });
}