@extends('notf/notf_base')
@section('notf94')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Solicitud de traspaso Enviada!",
                text: "¡La solicitud de traspaso fue enviada a presupuesto!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_traspaso_unidad')}}";
            })
      });
</script>
@endsection