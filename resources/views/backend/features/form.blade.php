<div class="card-body">
    <div class="row">
        <div class="col-sm-5">
            <h4 class="card-title mb-0">
                {{ __('Pakage Feature') }}
                <small class="text-muted">{{ __('Create package Feature') }}</small>
            </h4>
        </div>
        <!--col-->
    </div>
    <!--row-->

    <hr>

    <div class="row mt-4 mb-4">
        <div class="col">
            <div class="form-group row">
                {{ Form::label('name', trans('Package Feature Name'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('Enter Package Feature Name'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>

            <div class="form-group row">
                {{ Form::label('Name', trans('Localization'), ['class' => 'col-md-2 from-control-label required']) }}

                <div class="col-md-10">
                    {{ Form::text('localization', null, ['class' => 'form-control', 'placeholder' => trans('Package Feature Name In Arabic'), 'required' => 'required']) }}
                </div>
                <!--col-->
            </div>

            <div class="form-group row">
            {{ Form::label('question', trans('Select packages'), ['class' => 'col-md-2 from-control-label required']) }}

            <div class="col-md-10">
                @foreach($packages as $package)
                    <label>
                        <input type="checkbox" name="selectedpackage[]" value="{{ $package->id }}">
                        {{ $package->name }}
                    </label><br>
                @endforeach
            </div>
            <!-- col -->
        </div>


            
           
           
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