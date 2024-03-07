@extends('notf/notf_base')
@section('notf83')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error en Analizar!",
                text: "¡El proceso no se asigno a ningun analista!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_contrataciones_regional')}}";
            })
      });
</script>
@endsection