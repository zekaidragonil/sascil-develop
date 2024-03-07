@extends('notf/notf_base')
@section('notf99')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error en Asignación!",
                text: "¡Debe seleccionar al gerente regional para asignar el proceso de Alianza!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_asignar_alianza')}}";
            })
      });
</script>
@endsection