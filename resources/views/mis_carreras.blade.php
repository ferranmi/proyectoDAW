@extends('layouts.base')
@section('products')


<div class="col-lg-12">
    <div class="row table table-responsive">
        <div class="col-lg-4 d-flex mx-auto justify-content-center fondos_targetas dissenyBorders">

            <table>

                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Nombre de carrera</th>
                        <th>Dorsal</th>
                        <th>Distancia</th>
                        <th>Hora de inicio</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($inscr as $inscr )
                        <tr>
                            <td>{{ $inscr->firstname }}</td>
                            <td>{{ $inscr->name }}</td>
                            <td>{{ $inscr->dorsal }}</td>
                            <td> {{ $inscr->distance }}</td>
                            <td> {{ $inscr->time_start }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                No hay resultados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>




    </div>



</div>








</div>




@endsection
