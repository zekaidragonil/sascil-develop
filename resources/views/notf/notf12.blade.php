@extends('notf/notf_base')
@section('notf12')
<script>
      $(document).ready(function(){
            swal({
                    title:"Error al guardar el ente!!!",
                    text: "El ente que intenta ingresar ya existe!!!",
                    type: "error",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('view_entes')}}";
                })
        });
</script>
@endsection
