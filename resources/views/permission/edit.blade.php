@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atualizar Permission</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('permission.update',$registro->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="put"> 
                        <div class="form-group row">
                                <div class="form-group col-md-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">Nome</label>
                                        <input type="text" name="name" class="form-control" value="{{isset($registro->name) ? $registro->name : ''}}">
                                         @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                         @endif
                            </div>  
                            <div class="form-group col-md-3 {{ $errors->has('label') ? 'has-error' : '' }}">
                                    <label for="label">Label</label>
                                        <input type="text" name="label" class="form-control" value="{{isset($registro->label) ? $registro->label : ''}}">
                                         @if($errors->has('label'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('label') }}</strong>
                                            </span>
                                         @endif
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Atualizar') }}
                                </button>
                            </div>
                        </div>
                    </form> 
                    </div>
               
            </div>
        </div>
    </div>
</div>
@endsection
