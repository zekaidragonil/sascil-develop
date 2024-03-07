@extends('notf/notf_base')
@section('notf71')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error en asignar la solicitud!",
                text: "¡La solicitud no se asigno a ningún consultor, por favor intente nuevamente!",
                type: "warning",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_contrataciones_aceptadas')}}";
            })
      });
</script>
@endsection