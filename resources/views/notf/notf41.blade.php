@extends('notf/notf_base')
@section('notf41')
<script>
      $(document).ready(function(){
        swal({
                title:"Solicitud de Traspaso!!!",
                text: "La solicitud de traspaso se realizo de forma exitosa",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('solicitud_transferencia')}}";
            })
      });
</script>
@endsection