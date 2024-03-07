@extends('notf/notf_base')
@section('notf90')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Actualización de Estatus Exitosa!",
                text: "¡El estatus se ha actualizado de forma exitosa!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('analizar_solicitud_contrato_juridico')}}";
            })
      });
</script>
@endsection