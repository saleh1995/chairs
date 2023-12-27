@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('تعديل بيانات لقب 1 ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.first-title.update', $item) }}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="name_ar">{{ __('اللقب بالعربي') }}</label>
                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror"
                                id="name_ar" name="name_ar" value="{{ old('name_ar', $item->translate('ar')->name) }}">
                            @error('name_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name_en">{{ __('اللقب بالانجليزي') }}</label>
                            <input type="text" class="form-control @error('name_en') is-invalid @enderror"
                                id="name_en" name="name_en" value="{{ old('name_en', $item->translate('en')->name) }}">
                            @error('name_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    
                        <button type="submit" class="btn btn-primary">{{ __('تعديل') }}</button>
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
