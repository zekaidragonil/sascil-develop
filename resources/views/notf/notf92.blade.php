@extends('notf/notf_base')
@section('notf92')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Registro de Instrumento Legal!",
                text: "¡El nuevo instrumento legal se ha registrado de forma exitosa!",
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