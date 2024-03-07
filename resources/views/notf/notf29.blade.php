@extends('notf/notf_base')
@section('notf29')
<script>
      $(document).ready(function(){
            swal({
                    title:"Certificacion Rechazada!!!",
                    text: "Solicitud de certificacion presupuestaria fua rechazada, por favor verifique las observaciones y realice una nueva solicitud.",
                    type: "error",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('revisar_certificaciones')}}";
                })
        });
</script>
@endsection
