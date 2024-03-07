@extends('notf/notf_base')
@section('notf25')

<script>
      $(document).ready(function(){
            swal({
                    title:"Certificación presupuestaria Guardada!!!",
                    text: "La Solicitud no se actualizo por favor intente de nuevo.",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('certificado_presupuestario')}}";
                })
        });
</script>
@endsection
