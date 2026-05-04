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
                                <th style="width:300px;"></th>
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
                                    <td>
                                        @if ($lecturer->photo !=null )
                                            <img src="/storage/{{ $lecturer->photo }}" alt="" width="100%">
                                        @endif
                                    </td>
                                    <td>{{ $lecturer->name }}</td>
                                    <td>{{ $lecturer->surname }}</td>
                                    <td>{{ $lecturer->email }}</td>
                                    <td>{{ $lecturer->birthdate }}</td>
                                    <td>
                                        @foreach($lecturer->subjects as $subject)
                                            <div>{{ $subject->name }}</div>
                                        @endforeach
                                    </td>

                                    <td>
                                        <a href="{{ route('lecturer.edit', $lecturer->id) }}" class="btn btn-info">Edit</a>
                                        @can('deleteLecturer', $lecturer)
                                            <a href="{{ route('lecturer.destroy', $lecturer->id) }}" class="btn btn-danger">Delete</a>
                                        @endcan
                                    </td>

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
