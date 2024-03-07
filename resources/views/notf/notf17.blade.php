@extends('notf/notf_base')
@section('notf17')
<script>
        $(document).ready(function(){
            swal({
                    title:"POA no definido!!!",
                    text: "Debe cargar el Plan Opertivo Anual (POA) del año en curso!!!",
                    type: "success",
                    timer: 3000,
                    showConfirmButton: false,
                },
                function(){
                    window.location.href = "{{url('principal')}}";
                })
        });
</script>

@endsection
