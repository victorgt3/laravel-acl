@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Lista Post
                    @can('create_post', $registro) 
                    <a class="btn btn-info" style="float: right" href="{{url('post/create')}}" >Cadastrar Post</a>
                    @endcan
                </div>
                
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Titulo</th>
                                <th>Nome Autor</th>
                                <th>Descrição</th>
                                <th>Ações</th>
                            </tr>
                            @foreach($registro as $registros)
                            @can('view_post', $registros)
                            <tbody>
                                <tr>
                                    <th>{{$registros->id}}</th>
                                    <td>{{$registros->title}}</td>
                                    <td>{{$registros->user->name}}</td>
                                    <td>{{$registros->description}}</td>
                                    <td>
                                    @can('edit_post', $registros)
                                        <a class="btn btn-info" href="{{route('post.edit', $registros->id)}}">Editar</a>
                                    @endcan  
                                    @can('delete_post', $registros)  
                                        <a class="btn btn-danger" href="javascript:(confirm('Deseja deletar esse registro?') ? window.location.href='{{route('post.destroy',$registros->id)}}' : FALSE)">Deletar</a>
                                    @endcan    
                                    </td>
                                </tr>                            
                            </tbody>
                                @endcan
                            @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
