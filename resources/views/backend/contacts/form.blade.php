<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
               
                Connect with Blue Beiz
                
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            

            <div class="form-group row">
                {{ Form::label('Phone Number', trans('Phone Number'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-6">
                    {{ Form::text('phoneNumber', null, ['class' => 'form-control', 'placeholder' => trans('Enter Phone Number'), 'required' => 'required']) }}
                </div>
                
                <!--col-->
            </div>
            

            <div class="form-group row">
                {{ Form::label('email', trans('Email'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('Enter email '), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>

            <div class="form-group row">
                 {{ Form::label('address', trans('Address In English'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => trans('Enter In English')]) }}
                </div>
                <!--col-->
            </div>
            <div class="form-group row">
                 {{ Form::label('localization', trans('Address In Arabic'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::textarea('localization', null, ['class' => 'form-control', 'placeholder' => trans('Enter In Arabic')]) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

           
            <!--form-group-->
        </div>
        <!--col-->
    </div>
    <!--row-->
</div>
<!--card-body-->

@section('pagescript')
<script type="text/javascript">
    FTX.Utils.documentReady(function() {
        FTX.Faqs.edit.init("{{ config('locale.languages.' . app()->getLocale())[1] }}");
    });
</script>
@stop