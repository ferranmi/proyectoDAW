@extends('layouts.base')
@section('products')



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
                    <td>{{ $inscr->distance }}</td>
                    <td> {{ $inscr->dorsal }}</td>
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


@endsection
