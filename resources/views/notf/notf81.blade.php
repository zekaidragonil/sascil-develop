@extends('notf/notf_base')
@section('notf81')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error al asignar Modificación!",
                text: "¡El proceso de mofidicación presupuestaria no se asigno a ningun analista, por favor intente nuevamente!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('asignar_modificacion')}}";
            })
      });
</script>
@endsection