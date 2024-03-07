@extends('notf/notf_base')
@section('notf87')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Actualización Exitosa!",
                text: "¡El se ha actualizado el estatus de la solicitud de alianzas de forma exitosa!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_alianza_consultor_analizar')}}";
            })
      });
</script>
@endsection