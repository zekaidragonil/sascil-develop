@extends('notf/notf_base')
@section('notf68')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Error en Registrar la Empresa!",
                text: "¡Algo paso, verifique los datos ingresados e intente nuevamente!",
                type: "error",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('view_registro_empresa')}}";
            })
      });
</script>
@endsection