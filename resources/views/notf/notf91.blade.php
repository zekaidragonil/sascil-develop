@extends('notf/notf_base')
@section('notf91')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error en actualización!",
                text: "¡No se ha podido actualizar el estatus de la solicitud!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('analizar_solicitud_consultor_juridico')}}";
            })
      });
</script>
@endsection