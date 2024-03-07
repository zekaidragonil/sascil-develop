@extends('notf/notf_base')
@section('notf36')
<script>
      $(document).ready(function(){
        swal({
                title:"Algo salio mal!!!",
                text: "El correo electrónico no esta registrado.",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('recuperar_clave')}}";
            })
      });
</script>
@endsection
