@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('تعديل بيانات لقب 2 ') }}</div>

                <div class="card-body">
                    <div>
                        <label for="">اللقب بالعربي : </label>
                        <p>
                            {{ $item->translate('ar')->name }}
                        </p>
                    </div>
                    <div>
                        <label for="">اللقب بالانجليزي : </label>
                        <p>
                            {{ $item->translate('en')->name }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
