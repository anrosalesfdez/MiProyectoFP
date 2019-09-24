<template>
<div class="row" id="clientes">
    <div class="col-sm-12">
        <h1>Listado de Clientes</h1>
    </div>
    <div class="col-sm-7">
        <a href="#" class="btn btn-primary pull-right">
            Nuevo cliente
        </a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="cliente in clientes" v-bind:key="cliente.id">
                    <td>{{ cliente.id}}</td>
                    <td>{{ cliente.nombre}}</td>
                    <td width="10px">
                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                    <td width="10px">
                        <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-sm-5">
        <pre>{{ $data }}</pre>
    </div>

</div>

</template>

<script>
export default{
    data(){
        return {
            clientes:[]
        }
    },
    created: function(){
        this.getClientes();
    },
    methods:{
        getClientes: function(){
            var url = 'clientesData';
            axios.get(url).then(response => {
                this.clientes = response.data
            });
        }
    }
}
</script>