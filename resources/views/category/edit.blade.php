@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('تعديل بيانات فئة ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dashboard.category.update', $item) }}">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('الاسم') }}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name', $item->name) }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="color">{{ __('اللون') }}</label>
                            <input type="color" class="form-control @error('color') is-invalid @enderror"
                                id="color" name="color" value="{{ old('color', $item->color) }}">
                            @error('color')
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
