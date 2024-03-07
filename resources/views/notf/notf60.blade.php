@extends('notf/notf_base')
@section('notf61')
<script>
      $(document).ready(function(){
        swal({
                title:"Proceso Asignado!!!",
                text: "¡El caso fue asignado para su posterior analisis!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_certificacion')}}";
            })
      });
</script>
@endsection