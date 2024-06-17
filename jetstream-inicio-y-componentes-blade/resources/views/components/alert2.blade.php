<!--Componente anónimo-->
<!-- Los valores que empleará el componente ("parámetros") y a los que se les da valor desde la vista donde se llaman a los componentes se recuperan con la directiva de blade llamada "props", que recibe un array con el nombre de todas las variables de las que se les mande valor desde la llamada del componente en la vista-->
<!-- @props(['color']) --> 
@props(['color' => 'red']) <!--Para inicializarla con un valor predefinido, por si en la llamada al componente desde la vista no se le asigna valor al atributo-->

<div role="alert" {{$attributes}}> <!--$attributes aquí hace lo mismo que en componentes de clase-->
    <div style="background-color: {{$color}};" class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
        Danger
        {{$title ?? ''}}
    </div>
    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
        <p>Something not ideal might be happening.</p>
        <p>slot: {{$slot}}</p>
    </div>
</div>