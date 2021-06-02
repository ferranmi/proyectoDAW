@extends('layouts.base')
@section('products')


    <div class="col-lg-12">
        <div class="row table table-responsive">
            <div class="col-lg-4 d-flex mx-auto justify-content-center fondos_targetas dissenyBorders">

                <table>

                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($carrito as $compra )
                            <tr>
                                <td>{{ $compra->name }}</td>
                                <td>{{ $compra->price }}</td>
                                <td>{{ $compra->quantity }}</td>
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
