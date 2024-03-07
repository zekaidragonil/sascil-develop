@extends('notf/notf_base')
@section('notf74')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Número de Alianza Asignado!",
                text: "¡Se asigno el número de solicitud de inicio de proceso para la alianza!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_alianzas_recibidas_analizar')}}";
            })
      });
</script>
@endsection