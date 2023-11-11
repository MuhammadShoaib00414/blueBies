<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('Subscription') }}
                <small class="text-muted">{{ (isset($page)) ? __('labels.backend.access.pages.edit') : __('Package') }}</small>
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('title', trans('Package Name in English'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('Enetr Package Name'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            
        
            <div class="form-group row">
                {{ Form::label('seo_title', trans('Package Name in Arabic'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('localization', null, ['class' => 'form-control', 'placeholder' => trans('Enter package name in Arabic')]) }}
                </div>
                <!--col-->
            </div>
          
            <div class="form-group row">
                {{ Form::label('price', trans('Price'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::number('price', null, ['class' => 'form-control', 'placeholder' => trans('Enter Price')]) }}
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
        FTX.Pages.edit.init("{{ config('locale.languages.' . app()->getLocale())[1] }}");
    });
</script>
@stop