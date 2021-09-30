<div class="card">
    <div class="card-header">Countries</div>
    <div class="card-body">
        <div class="form-group">
            <label class="required" for="countries">{{ trans('cruds.common.fields.countries') }}</label>
            <div style="padding-bottom: 4px">
                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
            </div>
            <select class="form-control select2_tags {{ $errors->has('countries') ? 'is-invalid' : '' }}" name="countries[]" id="countries" multiple required>
                @foreach(nj_countries() as $country)
                    <option value="{{ $country->code }}" {{ in_array($country->code, old('countries', $countries)) ?'selected': ''}}>{{ $country->name }}</option>
                @endforeach
            </select>
            @if($errors->has('countries'))
                <div class="invalid-feedback">
                    {{ $errors->first('countries') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.common.fields.countries_helper') }}</span>
        </div>
    </div>
</div>
