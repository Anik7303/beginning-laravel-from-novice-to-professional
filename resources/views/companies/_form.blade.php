<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="name" class="col-md-3 col-form-label">{{ __('Name') }}</label>
            <div class="col-md-9">
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $company->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="website" class="col-md-3 col-form-label">{{ __('Website') }}</label>
            <div class="col-md-9">
                <input type="text" name="website" id="website"
                    class="form-control @error('website') is-invalid @enderror"
                    value="{{ old('website', $company->website) }}">
                @error('website')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label">{{ __('Email') }}</label>
            <div class="col-md-9">
                <input type="text" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $company->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-md-3 col-form-label">{{ __('Address') }}</label>
            <div class="col-md-9">
                <textarea name="address" id="address" rows="3" class="form-control @error('address') is-invalid @enderror">{{ old('address', $company->address) }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <hr>
        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit"
                    class="btn btn-primary">{{ $company->exists ? __('Update') : __('Save') }}</button>
                <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary">{{ __('Cancel') }}</a>
            </div>
        </div>
    </div>
</div>
