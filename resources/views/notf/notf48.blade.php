@extends('notf/notf_base')
@section('notf48')
<script>
      $(document).ready(function(){
        swal({
                title:"Solicitud en proceso !!!",
                text: "Esta solicitud de modificacion presupuestaria esta en proceso de!",
                type: "warning",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('presupuestaria')}}";
            })
      });
</script>
@endsection