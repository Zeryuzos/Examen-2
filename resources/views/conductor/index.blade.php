<x-app-layout>
    <div class="col-3 mb-2">
        <a class="btn btn-success" href="conductores/create">
            Agregar conductor
        </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nombres y apellidos</th>
                <th scope="col">especialidad</th>
                <th scope="col">Edad</th>
                <th scope="col">Estado</th>
                <th scope="col" colspan="2">Movimientos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conductores as $conductor)
            <tr>
                <th scope="row">{{$conductor->id}}</th>
                <td>{{$conductor->nombre}} {{$conductor->ap_paterno}} {{$conductor->ap_materno}}</td>
                <td>{{$conductor->especialidad}}</td>
                <td>{{$conductor->edad}}</td>
                <td>
                    @if ($conductor->estado === '1')
                    <b>Activo</b>
                    @else
                    <b>Inactivo</b>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary" href="/conductores/{{$conductor->id}}/edit">Editar</a>
                </td>
                <td>
                    <form action="{{route('conductores.destroy', $conductor->id)}}" method="POST">
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
