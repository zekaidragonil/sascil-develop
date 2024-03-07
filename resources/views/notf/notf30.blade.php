@extends('notf/notf_base')
@section('notf30')

<script>
    $(document).ready(function(){
        swal({
                title:"Asignación Existosa!!!",
                text: "La asignación presupuestaria se realizó satisfactoriamente.",
                type: "success",
                timer: 3000,
                showConfirmButton: false,
            },
            function(){
                window.location.href = "{{url('lista_poa')}}";
            })
    });
</script>
@endsection
