<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                Upload Partners Logo
                    </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>



    <div class="row mt-4 mb-4">
        <div class="col">
        <input type="hidden" name="id" class="form-control name_list" value="{{$partner->id}}"  />

        <div class="form-group row">
            {{ Form::label('title', trans('Title'), ['class' => 'col-md-2 from-control-label required']) }}
            <div class="col-md-5">
                {{ Form::text('title', $partner->title, ['class' => 'form-control', 'placeholder' => trans('Enter Title')]) }}
            </div>
            <div class="col-md-5">
                @if(isset(json_decode($partner->localization)->ar))
                    {{ Form::text('localization[ar][title]', json_decode($partner->localization)->ar->title, ['class' => 'form-control', 'placeholder' => trans('أدخل العنوان')]) }}
                @else
                    {{ Form::text('localization[ar][title]', '', ['class' => 'form-control', 'placeholder' => trans('أدخل العنوان')]) }}
                @endif
            </div>
        </div>
            <!--form-group-->
            <div class="form-group row">
                {{ Form::label('title', trans('Sub Title'), ['class' => 'col-md-2 from-control-label required']) }}
                <div class="col-md-5">
                    {{ Form::text('heading', $partner->heading, ['class' => 'form-control', 'placeholder' => trans('Enter Sub Title')]) }}
                </div>
                <div class="col-md-5">
                    @if(isset(json_decode($partner->localization)->ar))
                        {{ Form::text('localization[ar][heading]', json_decode($partner->localization)->ar->heading, ['class' => 'form-control', 'placeholder' => trans('أدخل العنوان')]) }}
                    @else
                        {{ Form::text('localization[ar][heading]', '', ['class' => 'form-control', 'placeholder' => trans('أدخل العنوان')]) }}
                    @endif
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('title', trans('Upload Images'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                <div class="form-group">
                    
                    <table class="table table-bordered table-hover" id="dynamic_field">
                    @foreach (json_decode($partner->images) as $image)
                        
                        <tr>
                        <td>
                                <input type="file" name="images[]" class="form-control name_list" value="{{$image}}" accept="image/*" />
                            </td>
                            

                            <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button>
                            </td>
                            <td>
                                <button type="button" name="remove" class="btn btn-danger btn_remove">X</button>
                                <img src="/{{$image}}" alt="" style="position: absolute;right:30px;width:45px">
                            </td>
                        </tr>
                        @endforeach
                    </table>
                   
                 </div>
                </div>
                <!--col-->
            </div>
        </div>
    </div>

</div>


<!--form-group-->
</div>
<!--col-->
</div>
<!--row-->
</div>
<!--card-body-->

@section('pagescript')
<script type="text/javascript">
     $(document).ready(function(){
   
   var i = 1;
     var length;
     //var addamount = 0;
    var addamount = 700;
 
   $("#add").click(function(){
     
      <!-- var rowIndex = $('#dynamic_field').find('tr').length;	 -->
      <!-- console.log('rowIndex: ' + rowIndex); -->
      <!-- console.log('amount: ' + addamount); -->
      <!-- var currentAmont = rowIndex * 700; -->
      <!-- console.log('current amount: ' + currentAmont); -->
      <!-- addamount += currentAmont; -->
      
      addamount += 700;
      console.log('amount: ' + addamount);
    i++;
    $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="file" name="images[]" class="form-control" accept="image/*" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');

    //    $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list"/></td><td><input type="text" name="email[]" placeholder="Enter your Email" class="form-control name_email"/></td>	<td><input type="text" name="amount[]" value="700" placeholder="Enter your Money" class="form-control total_amount"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
     });
 
   $(document).on('click', '.btn_remove', function(){  
     addamount -= 700;
     console.log('amount: ' + addamount);
     
     <!-- var rowIndex = $('#dynamic_field').find('tr').length;	 -->
      <!-- addamount -= (700 * rowIndex); -->
      <!-- console.log(addamount); -->
      
       var button_id = $(this).attr("id");     
       $('#row'+button_id+'').remove();  
     });
     
 
 
     $("#submit").on('click',function(event){
     var formdata = $("#add_name").serialize();
       console.log(formdata);
       
       event.preventDefault()
       
       $.ajax({
         url   :"action.php",
         type  :"POST",
         data  :formdata,
         cache :false,
         success:function(result){
           alert(result);
           $("#add_name")[0].reset();
         }
       });
       
     });
   });
</script>
@stop
