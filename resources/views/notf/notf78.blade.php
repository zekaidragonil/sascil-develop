@extends('notf/notf_base')
@section('notf78')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Traspaso Asignado!",
                text: "¡La solicitud de traspaso fue asignada de forma exitosa!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('asignar_traspaso')}}";
            })
      });
</script>
@endsection