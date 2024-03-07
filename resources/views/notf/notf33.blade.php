@extends('notf/notf_base')
@section('notf33')
<script>
      $(document).ready(function(){
        swal({
                title:"La partida ya fue asignada!!!",
                text: "Esta partida presupuestaria ya fue asignada a este proyecto.",
                type: "warning",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_poa')}}";
            })
      });
</script>
@endsection
