@extends('notf/notf_base')
@section('notf58')
<script>
      $(document).ready(function(){
        swal({
                title:"Error al Generar el certifiado!!!",
                text: "¡Se debe agregar al menos una partida presupuestaria a la solicitud de certificación!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('certificado_presupuestario')}}";
            })
      });
</script>
@endsection