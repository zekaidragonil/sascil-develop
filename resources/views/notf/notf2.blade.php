@extends('notf/notf_base')
@section('notf2')

<script>
      $(document).ready(function(){
            swal({
                    title:"Acceso Denegado!!!",
                    text: "El usuario, ente o unidad administrativa no existen",
                    type: "error",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('/')}}";
                })
        });

</script>
@endsection
