@extends('notf/notf_base')
@section('notf53')
<script>
      $(document).ready(function(){
        swal({
                title:"No se ha procesado la Soliciud!!!",
                text: "¡Las partida presupuestaria asociada al fondo que intenta ingresar ya existe!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('añadir_llave_presupuestaria')}}";
            })
      });
</script>
@endsection