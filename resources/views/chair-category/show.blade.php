@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('تعديل بيانات فئة ') }}</div>

                <div class="card-body">
                    <div>
                        <label for="">الاسم : </label>
                        <p>
                            {{ $item->name }}
                        </p>
                    </div>
                    <div>
                        <label for="">اللون : </label>
                        <p style="width: 10px; height: 10px; background-color: {{ $item->color }}">
                            
                        </p>
                    </div>
                    <div>
                        <label for="">لون النص : </label>
                        <p style="width: 10px; height: 10px; background-color: {{ $item->text_color }}">
                            
                        </p>
                    </div>
                    <div>
                        <label for="">الصورة : </label>
                        <img src="{{ Storage::url($item->image) }}" width="300" height="300" alt="">
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
