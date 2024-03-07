@extends('notf/notf_base')
@section('notf46')
<script>
      $(document).ready(function(){
        swal({
                title:"Solicitud Enviada!!!",
                text: "La solicitud de modificaciónha sido enviada para su aprobación.",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('presupuestaria')}}";
            })
      });
</script>
@endsection
