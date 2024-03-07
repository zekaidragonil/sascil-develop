@extends('notf/notf_base')
@section('notf97')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error en generar documento!",
                text: "¡El resultado de la consulta es vacio por favor intente nuevamente!",
                type: "warning",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('view_disponibilidad_presupuestaria')}}";
            })
      });
</script>
@endsection