<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <!--Se borra la etiqueta <style> que se incluye por defecto cuando se instala Jetstream (que trae incluido Tailwind) que dentro tiene todo el css correspondiente, y se reemplaza por la línea que ahora se encuentra acá referenciando a ese archivo-->
    @vite('public/css/app.css')

</head>

<body>
    <!--Parte para prueba de que funciona Tailwind-->
    <h1 class="text-3xl font-bold underline">
        Hello world!
      </h1>

    <div class="container mx-auto">
        <!--Con esta etiqueta como tal de está haciendo referencia a archivo Alert.php, el cuál a su vez ejecuta el método render() que es el que renderiza la vita (en alert.blade.php) que es lo que se muestra en esta parte-->
        <x-alert color="blue" />
        <!--Lo de " color="red" " es la asignación de valor al parámetro $color del _construct() en Alert.php. Es decir los parámetros con los que trabajará el compnente se pasan en la misma etiqueta con su respectivo valor, SIN ESPACIOS (sino da error)-->
        <x-alert />
        <!--Prueba de empleo del componente sin darle valor al parámetro $color, para que emplee el valor que tiene inicializado por defecto-->

        <!-- Si se quisiera por ejemplo mostrar además un mensaje con el valor que mandemos desde acá... -->
        <!-- una opción podría ser así, donde se define dentro del back del componente un atributo "mensaje" e igual que con "color" desde el _construct() se le da valor que se le da desde acá y ya se usa en el front del componente. PERO en casos de textos muy largos se vería muy feo asignándolo como valor de atributo-->
        <!-- <x-alert color="blue" mensaje="texto prueba" /*signo mayor que(no se pone porque da conflicto de comentarios)*  -->
        <!-- Otra opción, y más recomendable es: -->
        <!-- Poner el componente de esta manera (en dos etiquetas y ya no solo en una) donde lo que vaya dentro será el valor correspondiente a $slot (atributo por defecto de los componentes de blade, que no se tiene que declarar en el back ni nada, ya automáticamente sabe que lo que va dentro del componente cuando se pone en dos etiquetas es lo correspondiente al valor de $slot, mismo que ya se emplea en el front) -->
        <x-alert color="blue">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ad expedita, cumque eligendi nulla excepturi
            recusandae reiciendis repellendus cupiditate ut, quisquam deserunt commodi incidunt delectus eum quas,
            officiis itaque aperiam.
        </x-alert>

        <x-alert>
            Hola mundo
        </x-alert>

        <!-- En el supuesto de que ademas del mensaje se quisiera poner un título (igual, se podría hacer un atributo en el back, darle valor desde la vista y usarlo en el front del componente, pero se puede tener el mismo caso de que sea mucho texto y se vea feo, como con "mensaje"), entonces se recurririría a $slot, pero este ya está ocupado por el contenido del mensaje... -->
        <!-- ...pero se emplearán los "$slot con nombre". En estos básicamente dentro del componente puesto en dos etiquetas se abre una etiqueta (puestos aquí sin signos "mayor que" y "menor que" por los comentarios) " x-slot name="*nombre de la propiedad*" " y "/x-slot", donde lo que irá dentro es el valor de esa propiedad, que se podrá emplear en el front del componente, y de igual forma que con $slot, sin tener que declararla como atributo en el back -->
        <x-alert color="blue">
            <x-slot name="title">
                Titulo 1
            </x-slot>

            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ad expedita, cumque eligendi nulla excepturi
            recusandae reiciendis repellendus cupiditate ut, quisquam deserunt commodi incidunt delectus eum quas,
            officiis itaque aperiam.
        </x-alert>

        <x-alert>
            <x-slot name="title">
                Titulo 2
            </x-slot>

            Hola mundo
        </x-alert>

        <!-- Para asignarle a un parámetro de un componente de blade su valor en base a una variable (en este caso de php). Esto ya puede servir por ejemplo para cuando se tenga que recuperar la info de una BD y se alamcene en cierta variable y esa variable ya se emplee para darle el valor al parámetro del componente de blade -->
        @php
            $color = 'yellow'; //Por ahora hardcodeado, pero ya en un ámbito más real el valor de esta variable podría ser recuperado de una BD
        @endphp
        <x-alert :color="$color">
            <!--Se pone así, el parámetro con ":" antes y se le asigna su valor, que en este caso es la variable encerrada dentro de ""-->
            <x-slot name="title">
                Titulo 3
            </x-slot>

            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ad expedita, cumque eligendi nulla excepturi
            recusandae reiciendis repellendus cupiditate ut, quisquam deserunt commodi incidunt delectus eum quas,
            officiis itaque aperiam.
        </x-alert>


        <!-- Ahora, si por ejemplo se le quiere dar una clase en específico a la llamda de un componente aquí en la vista, pero sin que eso afecte a todos en general (que es lo que pasaría si se modifica el .blade.php del componente poniéndole directamente esa clase, por ej. "mb-4" (que es para dejar un espacio de 4px en la parte de abajo))... -->
        <!-- ...esto también servirá para ver el atributo $attributes, que también traen por defecto ya los componentes, el cual almacena todos los atributos y el valor que se les de cuando se llama a los componentes desde la vista, pero que no corresponden a ningun atributo de los definidos en el back del componente, ni a ningun slot ni ningún slot con nombre  -->
        <x-alert :color="$color" class="mb-4">
            <!--En este caso class="mb-4" corresponde a que queremos agregar "mb-4" como parte de las clases de los estilos del componente, pero como es una etiqueta de un componente de blade lo detectara como que le estamos dando el valor a algún parámetro, slot o slot con nombre del componente, pero como no encontrará referencia alguna todo eso lo guardará en "$attrbiutes" (ya en el front del componente está el como se agrega ese "mb-4", y también para que quede normal el componente si no se le pone un "class="mb-4"" cuando se llaman desde la vista)-->
            <x-slot name="title">
                Titulo 3
            </x-slot>

            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio ad expedita, cumque eligendi nulla excepturi
            recusandae reiciendis repellendus cupiditate ut, quisquam deserunt commodi incidunt delectus eum quas,
            officiis itaque aperiam.
        </x-alert>

        <!--Colocación de componentes para probar que lo de agregar la clase "mb-4" solo se aplico para el de arriba-->
        <x-alert>
            Hola mundo
        </x-alert>
        <x-alert>
            Hola mundo
        </x-alert>

        <x-alert color="red">
            <x-slot name="title">
                Componente donde se cumple lo de método prueba()
            </x-slot>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Beatae libero repellendus quaerat nemo asperiores
            quibusdam fugiat impedit! Rem fugit similique aliquam tempora nesciunt, vel, deserunt corrupti molestiae
            explicabo, quia voluptate.
        </x-alert>


        <!--Componentes anónimos-->
        <!-- También pueden recibir valores desde las llamadas en la vista, solo que dentro de su archivo .blade.php correspondiente se recuperan distinto (ya que no tienen back como tal, como los de clase) -->
        <x-alert2 color="blue" />
        <x-alert2 />
        <!--También tienen lo de $slot-->
        <x-alert2 color="blue">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, cupiditate saepe nihil eos velit numquam
            blanditiis est voluptatem sapiente ducimus, maiores nobis. Ad incidunt itaque earum quos asperiores facere
            sed.
        </x-alert2>
        <!--Tambié tienen lo de los $slot con nombre-->
        <x-alert2 color="blue">
            <x-slot name="title">
                Título de prueba (componente anónimo)
            </x-slot>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, recusandae. Nobis tempore, repellat odio
            quas beatae labore eius, dicta, sit sed maiores harum consectetur veritatis accusamus repudiandae in
            architecto animi!
        </x-alert2>
        <!-- De igual forma que en los componentes de clase, cualquier atributo al que se le de valor desde acá en la etiqueta del componente y que no esté definido en la directiva props del archivo del componente, se almacenará en "attrbiutes" -->
        <x-alert2 color="blue" class="mb-4">
            <x-slot name="title">
                Título de prueba (para ver $attributes)
            </x-slot>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, recusandae. Nobis tempore, repellat odio
            quas beatae labore eius, dicta, sit sed maiores harum consectetur veritatis accusamus repudiandae in
            architecto animi!
        </x-alert2>
        <!-- llamada de componente de prueba, para ver reflejado lo de $attrbiutes en el de arriba, que en este caso es que se aplica lo de " class="mb-4" " solo a ese componente (porque en ese momento se puso attributes dentro del div y toma todo eso y lo concatena y por eso se le aplica lo de esa clase)-->
        <x-alert2>
            <x-slot name="title">
                Título de prueba
            </x-slot>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, recusandae. Nobis tempore, repellat odio
            quas beatae labore eius, dicta, sit sed maiores harum consectetur veritatis accusamus repudiandae in
            architecto animi!
        </x-alert2>


        <!--"Componentes dinámicos"-->
        <!-- En el supuesto de que tuvieramos información dinámica, recuperada de una BD por ejemplo, y según sea el caso se deba mostrar una u otra alerta... -->
        @php
            $alert = 'alert' //Corresponderá al nombre de la alerta que se pretenda usar en un momento dado (si se pone solo "alert" se mostrará lo correspondiente a alert.blade.php, y si se pone "alert2" será lo correspondiente a "alert2.blade.php"). (En un caso más real esto se recuperaría de la BD por ejemplo)
         @endphp
        <x-dynamic-component :component="$alert">
            <x-slot name="title">
                Título de prueba (componente dinámico)
            </x-slot>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, recusandae. Nobis tempore, repellat odio
            quas beatae labore eius, dicta, sit sed maiores harum consectetur veritatis accusamus repudiandae in
            architecto animi!
        </x-dynamic-component>


    </div>

</body>

</html>