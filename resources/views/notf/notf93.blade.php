@extends('notf/notf_base')
@section('notf93')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error en cargar factura!",
                text: "¡La factura que intenta ingresar excede el monto disponible para este instrumento legal!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('cargar_factura')}}";
            })
      });
</script>
@endsection