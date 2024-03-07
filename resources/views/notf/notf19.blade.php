@extends('notf/notf_base')
@section('notf19')

<script>
      $(document).ready(function(){
            swal({
                    title:"Error en cargar solicitud!!!",
                    text: "Hubo un error al Cargar la solicitud, por favor intente nuevamente",
                    type: "error",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('principal')}}";
                })
        });
</script>

@endsection
