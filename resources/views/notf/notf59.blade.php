@extends('notf/notf_base')
@section('notf59')
<script>
      $(document).ready(function(){
        swal({
                title:"Error en los Montos!!!",
                text: "¡EL moto a certificar es menor al monto estimado, por favor verifique y genere nuevamente el pdf!",
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