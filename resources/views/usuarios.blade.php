@extends('layouts.base')
@section('home')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="  table-responsive">
            <table class="table">
                <thead class="bg-danger dissenyBorders ">
                    <th class="d-none col-lg-12 d-lg-block">DNI</th>
                    <th>Nombre</th>
                    <th class="d-none col-lg-12 d-lg-block">Apellidos</th>
                    <th>Email</th>
                    <th class="d-none col-lg-12 d-lg-block">Data Nacimiento</th>
                    <th>Codigo Postal</th>
                    <th>Poblacion</th>
                    <th>Tipo de usuario</th>
                    <th>Accion</th>
                </thead>
                <tbody class="dissenyBorders ">
                    <form name="filter" action="">
                        <tr>
                            <td class="d-none col-lg-12 d-lg-block">
                                <input type="text" id="dni_filter" name="dni_filter" value="{{ $filter->dni }}">
                            </td>
                            <td>
                                <input type="text" id="name_filter" name="name_filter" value="{{ $filter->name }}">
                            </td>
                            <td class="d-none col-lg-12 d-lg-block">
                                <input type="text" id="lastname_filter" name="lastname_filter"
                                    value="{{ $filter->lastname }}">
                            </td>
                            <td>
                                <input type="text" id="email_filter" name="email_filter" value="{{ $filter->email }}">
                            </td>
                            <td class="d-none col-lg-12 d-lg-block">
                                <input type="text" id="birth_date_filter" name="birth_date_filter"
                                    value="{{ $filter->birth_date }}">
                            </td>
                            <td>
                                <input type="text" id="C_postal_filter" name="C_postal_filter"
                                    value="{{ $filter->C_postal }}">
                            </td>
                            <td>
                                <input type="text" id="Poblacion_filter" name="Poblacion_filter"
                                    value="{{ $filter->Poblacion }}">
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
                                <button type="submit" class="btn btn-success" value="editar">Buscar</button>
                                <input type="reset" class="btn btn-warning" id="reset" value="reset">
                            </td>
                        </tr>



                    </form>
                    @forelse ($usuarios as $usuario)
                        <tr>
                            <td class="d-none col-lg-12 d-lg-block">
                                {{ $usuario->dni }}
                            </td>
                            <td>
                                {{ $usuario->firstname }}
                            </td>
                            <td class="d-none col-lg-12 d-lg-block">
                                {{ $usuario->lastname }}
                            </td>
                            <td>
                                {{ $usuario->email }}
                            </td>
                            <td class="d-none col-lg-12 d-lg-block">
                                {{ $usuario->birth_date }}
                            </td>
                            <td>
                                {{ $usuario->C_postal }}
                            </td>
                            <td>
                                {{ $usuario->Poblacion }}
                            </td>
                            <td>
                                {{ $usuario->type_user }}
                            </td>

                            <td>
                                <a href="/edit_user/{{ $usuario->id }}">
                                    <input type="button" class="btn btn-info" value="editar">
                                </a>
                                <a href="/usuarios/{{ $usuario->id }}">
                                    <input type="button" class="btn btn-danger" value="eliminar">
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">
                                No hay resultados
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 d-flex mx-auto justify-content-center mt-2">
        <p>
            <a href="/nuevo_usuario">
                <button type="submit" class=" btn btn-danger" value="editar">Crear usuario</button>
            </a>
        </p>

    </div>


@endsection
