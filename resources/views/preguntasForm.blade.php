@extends('layouts.main')

@section('titulo')
    <title>EXAMEN</title>
@endsection

@section('css')

@endsection

@section('titulo-pagina')
    <h1 class="h3 mb-4 text-gray-800">Lee con cuidado las preguntas y responde correctamente.</h1>
@endsection

@section('contenido')

   <div class="container">

       <form method="post" action="{{route('verifica.respuestas')}}">
       {{csrf_field()}}


           <!--PREGUNTA-->
         <div class="preguntas">
             <h1 class="h3 mb-4 text-black-50">Hay 5 estuches en la mesa. Cada uno contiene como mínimo 10 lápices y como máximo 14. ¿Cuál de estos podría ser el total de lápices?</h1>
             <div class="form-check">
                 <input class="form-check-input" type="radio" name="pregunta1" value="a" checked>
                 <label class="form-check-label" for="exampleRadios1">
                     a)45
                 </label>
             </div>
             <div class="form-check">
                 <input class="form-check-input" type="radio" name="pregunta1" value="b">
                 <label class="form-check-label" for="exampleRadios2">
                     b)75
                 </label>
             </div>
             <div class="form-check">
                 <input class="form-check-input" type="radio" name="pregunta1" value="c">
                 <label class="form-check-label" for="exampleRadios2">
                     c)65
                 </label>
             </div>
         </div>
           <!--PREGUNTA-->
           <div class="preguntas">
               <h1 class="h3 mb-4 text-black-50">Si X es menor que Y por una diferencia de 6 e Y es el doble de Z, ¿cuál es el valor de X cuando Z es igual a 2?</h1>
               <div class="form-check">
                   <input class="form-check-input" type="radio" name="pregunta2" value="a" checked>
                   <label class="form-check-label" for="exampleRadios1">
                       a)5
                   </label>
               </div>
               <div class="form-check">
                   <input class="form-check-input" type="radio" name="pregunta2" value="b">
                   <label class="form-check-label" for="exampleRadios2">
                       b)8
                   </label>
               </div>
               <div class="form-check">
                   <input class="form-check-input" type="radio" name="pregunta2" value="c">
                   <label class="form-check-label" for="exampleRadios2">
                       c)-2
                   </label>
               </div>
           </div>
           <!--PREGUNTA-->
           <div class="preguntas">
               <h1 class="h3 mb-4 text-black-50">Si David tiene el doble de monedas de 5 céntimos que Tomás y Tomás tiene 15 monedas de 5 céntimos más que Juan, ¿cuántos euros tiene David si Juan tiene 6 monedas de cinco céntimos?</h1>
               <div class="form-check">
                   <input class="form-check-input" type="radio" name="pregunta3" value="a" checked>
                   <label class="form-check-label" for="exampleRadios1">
                       a)2,10
                   </label>
               </div>
               <div class="form-check">
                   <input class="form-check-input" type="radio" name="pregunta3" value="b">
                   <label class="form-check-label" for="exampleRadios2">
                       b)42
                   </label>
               </div>
               <div class="form-check">
                   <input class="form-check-input" type="radio" name="pregunta3" value="c">
                   <label class="form-check-label" for="exampleRadios2">
                       c)21
                   </label>
               </div>
           </div>
           <!--PREGUNTA-->
           <div class="preguntas">
               <h1 class="h3 mb-4 text-black-50">Lisa recibió un cheque regalo de 100 euros por su cumpleaños. Se compró unas deportivas que costaban 30 euros, un vestido de 23 euros y dos libros de 17 euros. ¿Cuánto dinero le quedó en el cheque regalo?</h1>
               <div class="form-check">
                   <input class="form-check-input" type="radio" name="pregunta4" value="a" checked>
                   <label class="form-check-label" for="exampleRadios1">
                       a)30
                   </label>
               </div>
               <div class="form-check">
                   <input class="form-check-input" type="radio" name="pregunta4" value="b">
                   <label class="form-check-label" for="exampleRadios2">
                       b)13
                   </label>
               </div>
               <div class="form-check">
                   <input class="form-check-input" type="radio" name="pregunta4" value="c">
                   <label class="form-check-label" for="exampleRadios2">
                       c)45
                   </label>
               </div>
           </div>
           <!--PREGUNTA-->
           <div class="preguntas">
               <h1 class="h3 mb-4 text-black-50">3 (x-4) = 18. ¿Cuál es el valor de X?</h1>
               <div class="form-check">
                   <input class="form-check-input" type="radio" name="pregunta5" value="a" checked>
                   <label class="form-check-label" for="exampleRadios1">
                       a)6
                   </label>
               </div>
               <div class="form-check">
                   <input class="form-check-input" type="radio" name="pregunta5" value="b">
                   <label class="form-check-label" for="exampleRadios2">
                       b)14/3
                   </label>
               </div>
               <div class="form-check">
                   <input class="form-check-input" type="radio" name="pregunta5" value="c">
                   <label class="form-check-label" for="exampleRadios2">
                       c)10
                   </label>
               </div>
           </div>

           <div class="form-group">
           <button type="submit" class="btn btn-outline-warning">Enviar test</button>
           </div>

       </form>

   </div>

@endsection

@section('js')

@endsection

