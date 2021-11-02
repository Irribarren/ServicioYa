<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            REGISTRAR  SERVICIO
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{route('detalle.store')}}">
                        @csrf
                        <input type="text" @error("ubicacion") style="background: indianred" @enderror name="ubicacion"
                               placeholder="ingrese su ubicacion" value="{{old("ubicacion")}}"><br>
                        <input type="text" @error("descripcion") style="border:2px red solid" @enderror name="descripcion"
                               placeholder="ingrese descripcion" value="{{old("descripcion")}}"><br>
                        <input type="date" @error("fecha_entrega") style="border:2px red solid" @enderror name="fecha_entrega"
                               placeholder="ingrese la fecha de entrega" value="{{old("fecha_entrega")}}"><br>
                        <input type="text" @error("precio") style="border:2px red solid" @enderror name="precio"
                               placeholder="ingrese el precio" value="{{old("precio")}}"><br>
                        <input type="image" @error("foto_servicio") style="border:2px red solid" @enderror name="foto_servicio"
                               value="{{old("foto_servicio")}}"><br>
                        <input type="submit" value="Guardar">
                    </form>

                    @if ($errors->any())
                        <div style="color:red">
                            @foreach($errors->all() as $error)
                                {{$error}}<br>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
