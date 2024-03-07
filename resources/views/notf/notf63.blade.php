@extends('notf/notf_base')
@section('notf63')
<script>
      $(document).ready(function(){
        swal({
                title:"!Ocurrio Algo!",
                text: "¡La certificación no fue aprobada por favor verifique en intente nuevamente!",
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