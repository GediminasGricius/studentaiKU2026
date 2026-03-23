

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dėstytojų sąrašas</div>

                    <div class="card-body">
                        <form action="{{ route('lecturer.store') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Vardas</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė</label>
                                <input type="text" class="form-control" name="surname">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">El. paštas</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Gimimo data</label>
                                <input type="text" class="form-control" name="birthdate">
                            </div>
                            <button class="btn btn-success" type="submit">Pridėti</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
