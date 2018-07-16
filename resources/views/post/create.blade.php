@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Cadastrar Post') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('post.store') }}">
                        @csrf
                            <div class="form-group row">
                                <div class="col-md-4 form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                                    <label for="user_id">Usuário</label>
                                    <select id="user_id" class="form-control" name="user_id">
                                    <option value="">Selecione um Usuário</option>
                                        @foreach($registro as $registros)
                                        <option value="{{ $registros->id}}"{{( isset($registros->id) && $registros->id == $registros->id ? 'selected' : ''  )}} >
                                        {{ $registros->name}}
                                        </option>
                                    @endforeach  
                                    </select>
                                    @if($errors->has('user'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                                <div class="form-group col-md-3 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label for="title">Titulo</label>
                                        <input type="text" name="title" class="form-control">
                                         @if($errors->has('title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                         @endif
                                 </div>  
                                 <div class="form-group col-md-3 {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label for="description">Descrição</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                                         @if($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
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


