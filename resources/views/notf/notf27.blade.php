@extends('notf/notf_base')
@section('notf27')
<script>
      $(document).ready(function(){
            swal({
                    title:"Certificado Revisada!!!",
                    text:"Se ha revisado la certificacion presupuestaria de forma exitosa.",
                    type:"success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('revisar_certificaciones')}}";
                })
        });
</script>
@endsection
