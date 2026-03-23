@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('lecturers.lecturers_list') }}</div>

                <div class="card-body">
                    @if (Auth::user()->type=='admin')
                        <a href="{{ route('lecturer.create') }}" class="btn btn-success float-end">{{ __("lecturers.add_new") }}</a>
                    @endif
                    <hr class="mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('lecturers.name') }}</th>
                                <th>{{ __('lecturers.surname') }}</th>
                                <th>{{ __('lecturers.email') }} </th>
                                <th>{{ __('lecturers.birthdate') }}</th>
                                <th>{{ __('lecturers.subjects_taught') }}</th>
                                @if (Auth::user()->type=='admin')
                                    <th>{{ __('lecturers.actions') }}</th>
                                @endif
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($lecturers as $lecturer)
                                <tr>
                                    <td>{{ $lecturer->name }}</td>
                                    <td>{{ $lecturer->surname }}</td>
                                    <td>{{ $lecturer->email }}</td>
                                    <td>{{ $lecturer->birthdate }}</td>
                                    <td>
                                        @foreach($lecturer->subjects as $subject)
                                            <div>{{ $subject->name }}</div>
                                        @endforeach
                                    </td>
                                    @if (Auth::user()->type=='admin')
                                    <td>
                                        <a href="{{ route('lecturer.edit', $lecturer->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('lecturer.destroy', $lecturer->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
