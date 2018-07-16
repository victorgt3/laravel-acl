@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Permission') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('permission.store') }}">
                        @csrf
                            <div class="form-group row">
                                <div class="form-group col-md-3 {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label for="name">Nome</label>
                                        <input type="text" name="name" class="form-control">
                                         @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                         @endif
                            </div>  
                            <div class="form-group col-md-3 {{ $errors->has('label') ? 'has-error' : '' }}">
                                    <label for="label">Label</label>
                                        <input type="text" name="label" class="form-control">
                                         @if($errors->has('label'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('label') }}</strong>
                                            </span>
                                         @endif
                            </div>        
                            <div class="form-group col-md-12">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Salvar') }}
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


