@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Lista Role
                    <a class="btn btn-info" style="float: right" href="{{url('role/create')}}" >Cadastrar role</a>
                </div> 
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nome</th>
                                <th>Label</th>
                            </tr>
                            @foreach($registro as $registros)
                            <tbody>
                                <tr>
                                    <th>{{$registros->id}}</th>
                                    <td>{{$registros->name}}</td>
                                    <td>{{$registros->label}}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{route('role.edit', $registros->id)}}">Editar</a>
                                        <a class="btn btn-danger" href="javascript:(confirm('Deseja deletar esse registro?') ? window.location.href='{{route('role.destroy',$registros->id)}}' : FALSE)">Deletar</a>
                                    </td>
                                </tr>                            
                            </tbody>  
                            @endforeach
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
