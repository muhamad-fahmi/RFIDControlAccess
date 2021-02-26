@extends('layouts.header')
@section('content')
    <div class="card">
        <div class="card-header">
            Complete Card Data <br>
            <strong>UID : {{ strtoupper($data->uid) }}</strong>
        </div>
        <div class="card-body">
            <form action="/newcards/{{ $data->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="uid" value="{{$data->uid}}">
                <div class="form-group">
                    <label for="UID">Owner</label>
                    <x-input type="text" field="owner" value="{{ $data->owner }}"/>
                </div>
                <div class="form-group">
                    <label for="UID">No. HP</label>
                    <x-input type="text" field="No HP" value="{{ $data->nohp }}"/>
                </div>
                <div class="form-group">
                    <label for="UID">Address</label>
                    <x-input type="text" field="address" value="{{ $data->alamat }}"/>
                </div>
                <div class="form-group">
                    <label for="UID">Photo</label>
                    <input type="file" name="foto" id="foto" class="form-control-file">
                </div><br>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                <button type="submit" class="btn btn-primary btn-sm">Continue</button>
            </form>
        </div>
    </div>

@endsection
