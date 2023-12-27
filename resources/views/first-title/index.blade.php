@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('اللقب 1') }}</div>

                    <div class="card-body">
                        <a href="{{ route('dashboard.first-title.create') }}" class="btn btn-primary">{{ __('انشاء') }}</a>
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('اللقب 1 بالعربي') }}</th>
                                    <th scope="col">{{ __('اللقب 1 بالانجليزي') }}</th>
                                    <th scope="col">{{ __('الخيارات') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($collection as $item)
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <td>{{ $item->translate('ar')->name }}</td>
                                        <td>{{ $item->translate('en')->name }}</td>
                                        <td>
                                            <a href="{{ route('dashboard.first-title.edit', $item) }}"
                                                class="btn btn-info">{{ __('تعديل') }}</a>
                                            <a href="{{ route('dashboard.first-title.show', $item) }}"
                                                class="btn btn-secondary">{{ __('عرض') }}</a>
                                            <a href="{{ route('dashboard.first-title.destroy', $item) }}"
                                                class="btn btn-danger" onclick="event.preventDefault();
                                                document.getElementById('item-{{ $item->id }}').submit();">{{ __('حذف') }}</a>


                                            <form id="item-{{ $item->id }}" action="{{ route('dashboard.first-title.destroy', $item) }}"
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

                        {{ $collection->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
