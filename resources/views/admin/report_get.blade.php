@extends('layouts.master')

@section('run_custom_css')

@endsection
@section('top_header')
  Update Test 
@endsection


@section('content')

<!-- main area -->
<div class="main-content">
  <div class="row">
  <div class="panel mb25">
    <div class="panel-heading border">
    	Update Test Information
    </div>

    <div class="col-md-6 pull-left">
      <table class="table table-bordered table-hover">
        <tbody>
            <tr>
              <td>Report ID</td>
              <td>{{ $report->id }}</td>
            </tr>
            <tr>
              <td>Patient Name</td>
              <td>{{ $report->patient->name }}</td>
            </tr>                      
        </tbody>
      </table>
      </div>

      <div class="col-md-6 pull-right">
        <table class="table table-bordered table-hover">
          <tbody>

            <tr>
              <td>Patient ID</td>
              <td>{{ $report->patient_id }}-{{ $report->created_at->format('m-d-Y')}}</td>
            </tr>
            <tr>
              <td>Patient Mobile</td>
              <td>{{ $report->patient->pphone }}</td>
            </tr>
          </tbody>
        </table>
        </div>

      </div>
      </div>
    

<div class="row">
    <div class="panel mb25">
        <div class="panel-body">
  
  <div class="col-xs-12"> 
    <div class="box">
    <form action="{{ route('report.update' , $report->id)}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
     <input type="hidden" name="report_id" value="{{ $report->id }}">
    <input name="_method" type="hidden" value="Put">
    <div class='box-body'>  

      <div class="box-body">
       <div class="table-responsive">  
       
        <table id="invoice_bill" class="table table-bordered table-hover">
          <thead>
              <tr>
              <th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
              <th width="13%">Test ID</th>
              <th width="33%">Test Name</th>
              <th width="13%">Room No.</th>
              <th width="13%">Price</th>
            </tr>
            </thead>

            <tbody>
              
              @foreach($reportproducts as $reportproduct)
              <tr>
              <td><input class="case" type="checkbox"/></td>
              <td><input type="text" data-type="test_id" name="itemNo[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off" value="{{ $reportproduct->reportType_id }}" required></td>
              <td><input type="text" data-type="name" name="itemName[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off" value="{{ $reportproduct->report_name }}" required></td>
              <td><input type="text" data-type="room" name="itemAvailable[]" id="itemAvailable_1" class="form-control autocomplete_txt" autocomplete="off" value="{{ $reportproduct->report_room }}" required></td>
              <td><input type="number" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="{{ $reportproduct->report_cost }}" required readonly></td>
             </tr>

              @endforeach

                    </tbody>
                  </table>
                </div>
             <div class='col-xs-12 col-sm-3 col-md-3 col-lg-3'>
            <button class="btn btn-danger delete" type="button">- Delete</button>
            <button class="btn btn-success addmore" type="button">+ Add More</button>
          </div>

        
      <div class="row col-md-6 pull-right">
      <div class="form-group form-inline">
        <label class="col-sm-4" >Subtotal: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="subtotal" type="number" class="form-control" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="{{ $report->subtotal }}" readonly>
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Percent: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="percent" type="number" class="form-control" id="tax" placeholder="Percent" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="{{ $report->percent }}">
              <div class="input-group-addon">%</div>
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Percent Amount: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="percent_amount" type="text" class="form-control" id="taxAmount" placeholder="Percent" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="{{ $report->percent_amount }}">          
        </div>
      </div>

      <div class="form-group form-inline">
        <label class="col-sm-4">Without Percent: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="without_percent" type="text" class="form-control" id="totalAftertax" placeholder="Without Percen" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="{{ $report->without_percent }}">
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Discount Amount: &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="discount" type="number" class="form-control" id="amountPaid" placeholder="Discount Amount" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="{{ $report->discount }}">
        </div>
      </div>
      <div class="form-group form-inline">
        <label class="col-sm-4">Total : &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="total_paid" type="number" class="form-control amountDue" id="amountDue" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="{{ $report->total}}" readonly>
        </div>
      </div>

      <div class="form-group form-inline">
        <label class="col-sm-4">Paid : &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="" type="number" class="form-control" value="{{ $report->receive_cash }}" readonly>
        </div>
      </div>

      <div class="form-group form-inline">
        <label class="col-sm-4">Receive Cash : &nbsp;</label>
        <div class="input-group col-sm-6">
          <div class="input-group-addon">Tk.</div>
          <input name="receive_cash" type="number" class="form-control" placeholder="Receive Cash" required>
        </div>
      </div>

        <div class="form-group">        
          <label class="col-sm-4"></label>  
          <div class="input-group col-sm-6">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
          </div>
        </div>    
    </div>


        </div> <!--box body -->


      </form>
      </div>
   </div>

  <!-- Invoice System -->  


  </div>
</div>



  <!-- /main area -->
</div>
<!-- /content panel -->
@endsection


@section('run_custom_jquery')
<script type="text/javascript">
  /**
 * Site : http:www.somrat.info
 * @author G. M. Nazmul Hossain Somrat
 */
        
//adds extra table rows
var i=$('#invoice_bill tr').length;
$(".addmore").on('click',function(){
  html = '<tr>';
  html += '<td><input class="case" type="checkbox"/></td>';
  html += '<td><input type="text" data-type="test_id" name="itemNo[]" id="itemNo_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
  html += '<td><input type="text" data-type="name" name="itemName[]" id="itemName_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
  html += '<td><input type="text" data-type="productAvailable" name="itemAvailable[]" id="itemAvailable_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
  html += '<td><input type="text" name="total[]" id="total_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly></td>';
  html += '</tr>';
  $('#invoice_bill').append(html);
  i++;
});

//to check all checkboxes
$(document).on('change','#check_all',function(){
  $('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$(".delete").on('click', function() {
  $('.case:checkbox:checked').parents("tr").remove();
  $('#check_all').prop("checked", false); 
  calculateTotal();
});

//autocomplete script
$(document).on('focus','.autocomplete_txt',function(){
  type = $(this).data('type');
  
  if(type =='test_id' )autoTypeNo=0;
  if(type =='name' )autoTypeNo=1;  
  
  $(this).autocomplete({
    source: function( request, response ) {
      $.ajax({
        url : 'http://localhost/hospital/resources/views/admin/ajax.php',
        dataType: "json",
        method: 'post',
        data: {
           name_startsWith: request.term,
           type: type
        },
         success: function( data ) {
           response( $.map( data, function( item ) {
            var code = item.split("|");
            return {
              label: code[autoTypeNo],
              value: code[autoTypeNo],
              data : item
            }
          }));
        }
      });
    },
    autoFocus: true,          
    minLength: 0,
    select: function( event, ui ) {
      var names = ui.item.data.split("|");            
      id_arr = $(this).attr('id');
        id = id_arr.split("_");
      $('#itemNo_'+id[1]).val(names[0]);
      $('#itemName_'+id[1]).val(names[1]);
      $('#itemAvailable_'+id[1]).val(names[2]);
      $('#total_'+id[1]).val(names[3] );
      calculateTotal();
    }           
  });
});

//price change
$(document).on('change keyup blur','.changesNo',function(){
  id_arr = $(this).attr('id');
  id = id_arr.split("_");
  price = $('#price_'+id[1]).val();
  if(price !='' ) $('#total_'+id[1]).val(parseFloat(price).toFixed(2) ); 
  calculateTotal();
});

$(document).on('change keyup blur','#tax',function(){
  calculateTotal();
});

//total price calculation 
function calculateTotal(){
  subTotal = 0 ; total = 0; 
  $('.totalLinePrice').each(function(){
    if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
  });
  $('#subTotal').val( subTotal.toFixed(2) );
  tax = $('#tax').val();
  if(tax != '' && typeof(tax) != "undefined" ){
    taxAmount = subTotal * ( parseFloat(tax) /100 );
    $('#taxAmount').val(taxAmount.toFixed());
    total = subTotal - taxAmount;
  }else{
    $('#taxAmount').val(0);
    total = subTotal;
  }
  $('#totalAftertax').val( total.toFixed() );
  calculateAmountDue();
}

$(document).on('change keyup blur','#amountPaid',function(){
  calculateAmountDue();
});

//due amount calculation
function calculateAmountDue(){
  amountPaid = $('#amountPaid').val();
  total = $('#totalAftertax').val();
  if(amountPaid != '' && typeof(amountPaid) != "undefined" ){
    amountDue = parseFloat(total) - parseFloat( amountPaid );
    $('.amountDue').val( amountDue.toFixed() );
  }else{
    total = parseFloat(total).toFixed();
    $('.amountDue').val( total );
  }
}


//It restrict the non-numbers
var specialKeys = new Array();
specialKeys.push(8,46); //Backspace
function IsNumeric(e) {
    var keyCode = e.which ? e.which : e.keyCode;
    console.log( keyCode );
    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    return ret;
}

</script>
@endsection