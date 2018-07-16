@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Atualizar Post</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('post.update',$registro->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="put"> 
                        <div class="form-group row">
                        <div class="col-md-4 form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                                    <label for="user_id">Usuário</label>
                                    <select id="user_id" class="form-control" name="user_id">
                                    <option value="">Selecione um Usuário</option>
                                        <option value="{{ $registro->user->id}}"{{( isset($registro->user->id) && $registro->user->id == $registro->user->id ? 'selected' : ''  )}} >
                                        {{ $registro->user->name}}
                                        </option>
                                    </select>
                                    @if($errors->has('user'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user') }}</strong>
                                        </span>
                                    @endif
                                 </div>
                                <div class="form-group col-md-3 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label for="title">Titulo</label>
                                        <input type="text" name="title" class="form-control" value="{{isset($registro->title) ? $registro->title : ''}}">
                                         @if($errors->has('title'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                         @endif
                                 </div>  
                                 <div class="form-group col-md-3 {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label for="description">Descrição</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" value="{{isset($registro->description) ? $registro->description : ''}}">
                                        {{$registro->description}}
                                        </textarea>
                                         @if($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
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
