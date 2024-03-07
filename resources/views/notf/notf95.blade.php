@extends('notf/notf_base')
@section('notf95')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error en cargar los archivos!",
                text: "¡Ocurrio un error al cargar la solicitud de traspaso por favor intente nuevamente!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_traspaso_unidad')}}";
            })
      });
</script>
@endsection