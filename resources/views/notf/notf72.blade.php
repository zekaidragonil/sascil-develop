@extends('notf/notf_base')
@section('notf72')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Solicitud Asignada!",
                text: "¡La solicitud se a asignado de forma exitosa!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_contrataciones_aceptadas')}}";
            })
      });
</script>
@endsection