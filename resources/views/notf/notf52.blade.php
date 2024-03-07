@extends('notf/notf_base')
@section('notf52')
<script>
      $(document).ready(function(){
        swal({
                title:"No se ha procesado la Soliciud!!!",
                text: "¡Tuvimos un inconveniente, por favor intente nuevamente!",
                type: "warning",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_modificacion_presupuestaria')}}";
            })
      });
</script>
@endsection