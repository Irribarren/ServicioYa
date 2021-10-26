<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($titulo) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table w-full">
                        <tr>
                            <th>id</th>
                            <th>Ubicacion</th>
                            <th>Fecha de entrega</th>
                            <th>Precio</th>
                            <th>Foto</th>
                            <th>&nbsp</th>
                            <th>&nbsp</th>
                        </tr>

                        @foreach ($detalleServicio as $deta)
                            @if($deta->id%2!=0)
                                <tr style="background-color: darkseagreen">
                            @else
                                <tr>
                                    @endif
                                    <td>{{$deta->id}}</td>
                                    <td>{{$deta->ubicacion}}</td>
                                    <td>{{$deta->fecha_entrega}}</td>
                                    <td>{{$deta->precio}}</td>
                                    <td>{{$deta->foto_servicio}}</td>
                                    <td>
                                        <form method='get' action='estudiante/{{$deta->id}}/edit'>
                                            <input type='submit' value='Actualizar'>
                                            @csrf
                                            @method("GET")
                                        </form>
                                    <td>
                                        <form method='post' action='detalleServicio/{{$deta->id}}'>
                                            <input type='submit' value='Elimnar'>
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                    </table>
                    <a style="color: brown" href="{{Route("detalle.create")}}">Agregar Servicio</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
