@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Subjects list')  }}</div>

                <div class="card-body">
                    @if (Auth::user()->type=='admin')
                        <a href="{{ route('subjects.create') }}" class="btn btn-success float-end">{{ __('Add new subject') }}</a>
                    @endif
                    <hr class="mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __("Name") }}</th>
                                <th>{{ __("Description") }}</th>
                                <th>{{ __("Lecturer") }}</th>
                                <th>{{ __("Semester") }}</th>
                                @if (Auth::user()->type=='admin')
                                <th>{{ __("Actions") }}</th>
                                @endif
                            </tr>

                        </thead>
                        <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->description }}</td>
                                    <td>{{ $subject->lecturer->name }} {{ $subject->lecturer->surname }}</td>
                                    <td>{{ $subject->semester }}</td>
                                    @if (Auth::user()->type=='admin')
                                    <td>
                                        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-info">{{ __("Edit") }}</a>
                                        <a href="{{ route('subjects.destroy', $subject->id) }}" class="btn btn-danger">{{ __("Delete") }}</a>
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
