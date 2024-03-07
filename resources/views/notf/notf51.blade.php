@extends('notf/notf_base')
@section('notf51')
<script>
      $(document).ready(function(){
        swal({
                title:"Solicitud de modificacion Aprobada!!!",
                text: "¡La solicitud de modificacion presupuestaria fue aprobada de manera satisfactoria    !",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_modificacion_presupuestaria')}}";
            })
      });
</script>
@endsection