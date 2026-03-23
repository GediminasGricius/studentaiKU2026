@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dėstytojo redagavimas</div>

                    <div class="card-body">
                        <form action="{{ route('lecturer.update', $lecturer->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label class="form-label">Vardas</label>
                                <input type="text" class="form-control" name="name" value="{{$lecturer->name}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė</label>
                                <input type="text" class="form-control" name="surname"  value="{{$lecturer->surname}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">El. paštas</label>
                                <input type="text" class="form-control" name="email" value="{{$lecturer->email}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gimimo data</label>
                                <input type="text" class="form-control" name="birthdate"  value="{{$lecturer->birthdate}}">
                            </div>
                            <button class="btn btn-success" type="submit">Atnaujinti įrašus</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
