@extends('notf/notf_base')
@section('notf40')
<script>
      $(document).ready(function(){
        swal({
                title:"Certificación Reversada!!!",
                text: "La certificacion fue reversada de forma exitosa",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('cert_reversar')}}";
            })
      });
</script>
@endsection
