@extends('notf/notf_base')
@section('notf62')
<script>
      $(document).ready(function(){
        swal({
                title:"¡Certificacion Aprobada!",
                text: "¡La certificación presupuestaria fue aprobada de forma exitosa!",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('revisar_certificaciones')}}";
            })
      });
</script>
@endsection