<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('labels.backend.access.faqs.management') }}
                <small class="text-muted">{{ __('labels.backend.access.faqs.create') }}</small>
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('question', trans('Enter Question in English'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-4">
                    {{ Form::text('question', null, ['class' => 'form-control', 'placeholder' => trans('Enter Question in Arabic'), 'required' => 'required']) }}
                </div>

                {{ Form::label('localization', trans('Enter Question in Arabic'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-4">
                    {{ Form::text('localization[]', null, ['class' => 'form-control', 'placeholder' => trans('Enter Question in Arabic'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('answer', trans('Enter Answer in English'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-4">
                    {{ Form::text('answer', null, ['class' => 'form-control', 'placeholder' => trans('Enter Answer in English')]) }}
                </div>

                {{ Form::label('localization', trans('Enter Answer in Arabic'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-4">
                    {{ Form::text('localization[]', null, ['class' => 'form-control', 'placeholder' => trans('Enter Answer in Arabic')]) }}
                </div>
                <!--col-->
            </div>
            <!--form-group-->

            <div class="form-group row">
                {{ Form::label('status', trans('validation.attributes.backend.access.faqs.status'), ['class' => 'col-md-2 from-control-label required']) }}

                @php
                    $status = isset($faq) ? '' : 'checked'
                @endphp

                <div class="col-md-10">
                    <div class="checkbox d-flex align-items-center">
                        <label class="switch switch-label switch-pill switch-primary mr-2" for="role-1"><input
                                class="switch-input" type="checkbox" name="status" id="role-1" value="1"
                                {{ (isset($faq->status) && $faq->status === 1) ? "checked" : $status }}><span
                                class="switch-slider" data-checked="on" data-unchecked="off"></span></label>
                    </div>
                </div>
                <!--col-->
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
    FTX.Utils.documentReady(function () {
        FTX.Faqs.edit.init(
            "{{ config('locale.languages.' . app()->getLocale())[1] }}");
    });

</script>
@stop
