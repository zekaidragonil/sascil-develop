@extends('notf/notf_base')
@section('notf44')
<script>
      $(document).ready(function(){
        swal({
                title:"Actualización Realizada!!!",
                text: "La solicitud ha sido actualizada y enviada a presupuesto",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_solicitud')}}";
            })
      });
</script>
@endsection
