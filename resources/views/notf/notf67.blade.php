@extends('notf/notf_base')
@section('notf67')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Registro Exitoso!",
                text: "¡Los datos de la empresa se han registrad de forma Exitosa!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('view_registro_empresa')}}";
            })
      });
</script>
@endsection