@extends('notf/notf_base')
@section('notf31')
<script>
      $(document).ready(function(){
        swal({
                title:"Error al Cargar la asignación!!!",
                text: "La asignación presupuestaria ya existe, por favor intente nuevamente.",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_certificacion')}}";
            })
      });
</script>
@endsection
