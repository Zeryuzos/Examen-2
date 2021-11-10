<x-app-layout>
    <div class="my-3 row">
        <div class="col-3">
            <a class="btn btn-success" href="maquinarias/create">
                Agregar
            </a>
        </div>
    </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Conductor</th>
                    <th scope="col" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maquinarias as $maquinaria)
                <tr>
                    <th scope="row">{{$maquinaria->id}}</th>
                    <td>{{$maquinaria->nombre}}</td>
                    <td>{{$maquinaria->marca}}</td>
                    <td>{{$maquinaria->modelo}}</td>
                    <td>
                        @if ($maquinaria->estado == '1')
                        <b>Activo</b>
                        @else
                        <b>Inactivo</b>
                        @endif
                    </td>
                    @if ($maquinaria->conductor_id)
                    <td>{{$maquinaria->conductor->nombre}}</td>
                    @else
                    <td>Ningun Conductor</td>
                    @endif
                    <td>
                        <a class="btn btn-primary" href="/maquinarias/{{$maquinaria->id}}/edit">Editar</a>
                    </td>
                    <td>
                        <form action="{{route('maquinarias.destroy', $maquinaria->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</x-app-layout>
