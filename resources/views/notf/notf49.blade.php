@extends('notf/notf_base')
@section('notf49')
<script>
      $(document).ready(function(){
        swal({
                title:"Solicitud Procesada !!!",
                text: "Esta solicitud de modificacion presupuestaria ya hasido procesada!",
                type: "warning",
                timer: 3000,
                showConfirmButton: false,
            }
            function(){
                window.location.href = "{{url('presupuestaria')}}";
            })
      });
</script>
@endsection