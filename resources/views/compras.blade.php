@extends('layouts.base')
@section('home')

    <div class="col-lg-12 mt-5 mb-5 d-flex justify-content-center">
        <div class=" col-lg-4 rounded dissenyBorders">
            <form class="register" name="register" method="post">
                @csrf
                <h3 class="display-4 mb-2">Compra Producte</h3>
                <div>
                    <label>Nombre producto</label>
                    <input type="text" id="name" name="name" required value='{{ $product->name }}' disabled />
                </div>
                <div>
                    <label>Cantidad:</label>

                    <input class="cantidad" type="number" id="cantidad" name="cantidad" min="0" required />
                    @error('cantidad')
                        <br>
                        <small>*{{ $message }}</small>
                        <br>
                    @enderror
                </div>
                <div>
                    <label>Precio:</label>
                    <input type=" text" id="precio" name="precio" required value=' {{ $product->price }}' disabled />
                </div>

                <div>
                    <input class="btn btn-danger mb-2" type="submit" value="Enviar" id="submit" name="submit" />
                    <input type="hidden" id="carrera" name="carrera" value="{{ $product->id }}">
                </div>
            </form>
        </div>
    </div>

@endsection
