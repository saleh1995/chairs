@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('الفئة') }}</div>

                    <div class="card-body">
                        <a href="{{ route('dashboard.category.create') }}" class="btn btn-primary">{{ __('انشاء') }}</a>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('اللون') }}</th>
                                    <th scope="col">{{ __('الاسم') }}</th>
                                    <th scope="col">{{ __('الخيارات') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($collection as $item)
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <td><div style="width: 10px; height:10px; background-color:{{ $item->color }}"></div></td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.category.edit', $item) }}"
                                                class="btn btn-info">{{ __('تعديل') }}</a>
                                            <a href="{{ route('dashboard.category.show', $item) }}"
                                                class="btn btn-secondary">{{ __('عرض') }}</a>
                                            <a href="{{ route('dashboard.category.destroy', $item) }}"
                                                class="btn btn-danger" onclick="event.preventDefault();
                                                document.getElementById('item-{{ $item->id }}').submit();">{{ __('حذف') }}</a>


                                            <form id="item-{{ $item->id }}" action="{{ route('dashboard.category.destroy', $item) }}"
                                                method="POST" class="d-none">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <th colspan="100">
                                            <center>
                                                {{ __('لا يوجد سجلات') }}
                                            </center>
                                        </th>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
