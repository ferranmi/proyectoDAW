@extends('layouts.base')
@section('products')

    <table>
        <thead>
            <th>DNI</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Data Nacimiento</th>
            <th>Tipo de usuario</th>
            <th>Codigo Postal</th>
            <th>Poblacion</th>
            <th>Accion</th>
        </thead>
        <tbody>
            <form name="filter" action="">
                <tr>
                    <td>
                        <input type="text" id="dni_filter" name="dni_filter" value="{{ $filter->dni }}">
                    </td>
                    <td>
                        <input type="text" id="name_filter" name="name_filter" value="{{ $filter->name }}">
                    </td>
                    <td>
                        <input type="text" id="lastname_filter" name="lastname_filter" value="{{ $filter->lastname }}">
                    </td>
                    <td>
                        <input type="text" id="email_filter" name="email_filter" value="{{ $filter->email }}">
                    </td>
                    <td>
                        <input type="text" id="birth_date_filter" name="birth_date_filter"
                            value="{{ $filter->birth_date }}">
                    </td>
                    <td>
                        <select id="type_user" id="type_user_filter" name="type_user_filter">
                            <option>
                                @if ($filter->type_user == 'C')
                            <option value="C" selected>Cliente</option>
                            <option value="A">Administrador</option>
                        @else
                            <option value="C">Cliente</option>
                            <option value="A" selected>Administrador</option>
                            @endif
                        </select>
                    </td>
                    <td>
                        <input type="text" id="C_postal" name="C_postal" value="{{ $filter->C_postal }}">
                    </td>
                    <td>
                        <input type="text" id="Poblacion" name="Poblacion" value="{{ $filter->Poblacion }}">
                    </td>
                    <td>
                        <button type="submit" class="btn-success" value="editar">Buscar</button>
                        <button type="submit" class="btn-warning" id="reset" value="editar">Reset</button>
                    </td>
                </tr>
            </form>
            @forelse ($usuarios as $usuario)
                <tr>
                    <td>
                        {{ $usuario->dni }}
                    </td>
                    <td>
                        {{ $usuario->name }}
                    </td>
                    <td>
                        {{ $usuario->lastname }}
                    </td>
                    <td>
                        {{ $usuario->email }}
                    </td>
                    <td>
                        {{ $usuario->birth_date }}
                    </td>
                    <td>
                        {{ $usuario->type_user }}
                    </td>
                    <td>
                        {{ $usuario->C_postal }}
                    </td>
                    <td>
                        {{ $usuario->Poblacion }}
                    </td>
                    <td>
                        <a href="/edit_user/{{ $usuario->id }}">
                            <input type="button" class="btn-info" value="editar">
                        </a>
                        <a href="/usuarios/{{ $usuario->id }}">
                            <input type="button" class="btn-danger" value="eliminar">
                        </a>
                    </td>
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
    <p>
        <a href="/nuevo_usuario">
            <button type="submit" class="btn-success" value="editar">Crear usuario</button>
        </a>
    </p>

@endsection
