<!--Se emplea el atributo $color del componente (al cuál se le irá dando valor como parámetro en las vistas donde se mande a llamar el componente, o que sino se quedará con el valor por defecto definido en el _construct()-->
<!-- <div class="flex bg-{{$color}}-100 rounded-lg p-4 mb-4 text-sm text-{{$color}}-700" role="alert"> --> <!--Como estaba esta parte antes de ver lo del atributo $attributes, y lo de como agregar una clase de diseño sin afectar a todos los componentes de los que se haga llamada desde la vista, sino solo a aquellos que tengan lo de "class="mb-4""-->
    <div {{$attributes->merge(["class" => "flex bg-$color-100 rounded-lg p-4 text-sm text-$color-700"])}} role="alert"> <!--En este caso cuando en las llamadas al componente en la vista haya uno con " class="mb-4" " por ejemplo, ese será el valor de $attributes, pero como aquí ya había un " class="" " se traslapan y solo se toma en cuenta el primero que esté, pero ya con esto del $merge([]) lo que se logra es que cuando sea este caso si ya hay un "class" en este caso del de $attrbiutes ya solo se mezcle con todo lo demás. Y en el caso de llamadas al componente de la vista que no tengan lo de " class="mb-4" " también se seguirán aplicando esos mismos estilos-->
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div style="background-color: {{$color}};">
            <span class="font-medium">Warning alert!</span> Change a few things up and try submitting again.
            <p style="font-weight: bold;">{{ $title ?? '' }}</p>
            <p>{{$slot}}</p>
        
        
            {{$attributes}} <!--En esta parte se verán los valores que adquiere $attributes que son los correspondientes a cuando se llaman los componentes en las vistas y se les da valor a atributos que no coinciden con algún atributo, slot o slot con nombre definido para el componente en su back o front respectivamente-->
    
            {{$prueba()}} <!--Llamada al método prueba()-->
        </div>
    </div>