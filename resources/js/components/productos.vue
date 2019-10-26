<template>
    <div class="row justify-content-center">
      
        <div class="col-md-12 espacios">
            <h3 style="display: inline">Mantenimiento de Productos</h3>
            <button class="btn btn-success" @click="toggler">
                <span class="oi oi-plus"></span>
            </button>
        </div>

            <div class="col-md-12 espacios" v-if="isActive">
                <label><strong>Nuevo producto:</strong></br>
                    <input type="text" id="nombre" v-model="nuevo.nombre" placeholder="nombre">
                    <!-- FIXME: no consigo darle foco! -->
                    <input type="text" v-model="nuevo.descripcion" placeholder="descripcion">
                    <input type="number" v-model="nuevo.precio" step="0.01" value="0.00" placeholder="precio">
                    <button title="crear" class="btn btn-success" @click="crear" >Crear</button>
                </label>
            </div>

            <div class="col-md-12 espacios" v-if="isEditing">
                <label><strong>Editando producto:</strong></br>
                    <input type="text" id="id" v-model="editado.id" value="this.editado.id" readonly disabled>
                    <input type="text" id="nombre" v-model="editado.nombre" value="this.editado.nombre">
                    <!-- FIXME: no consigo darle foco! -->
                    <input type="text" v-model="editado.descripcion" value="this.editado.descripcion">
                    <input type="number" v-model="editado.precio" step="0.01" value="this.editado.precio">
                    <button title="crear" class="btn btn-success" @click="actualizar(editado.id)" >Actualizar</button>
                    <button title="crear" class="btn btn-danger" @click="toggler2" >Cancelar</button>
                </label>
            </div>

        <div class="col-md-12 espacios">
            <v-client-table ref="tabla" class="col-md-12" :data="productos" :columns="columns" :options="options">
                <div slot="acciones" slot-scope="props" style="display: inline">
                    <button title="editar" class="btn btn-xs" @click="editar(props.row.id)" >
                        <i class="material-icons" style="font-size: 18px; color:blue">edit</i>
                    </button>
                    <button title="eliminar" class="btn btn-xs" @click.prevent="eliminar(props.row.id)">
                    <i class="material-icons" style="font-size: 18px; color:red">delete</i>
                    </button>
                </div>
            </v-client-table> 
        </div>
        
        
    </div>
</template>

<script>
export default {
    data(){
        return{
            // csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

            isActive: false,

            isEditing: false,

            nuevo: {
                nombre: '',
                descripcion:'',
                precio:''
            },

            editado: {
                id: '',
                nombre: '',
                descripcion:'',
                precio:''
            },

            columns: ['id', 'nombre', 'descripcion', 'precio', 'created_at', 'updated_at', 'acciones'],
            
            filterByColumn: false,

            options:{
                dateColumns:['created_at','updated_at'],
                toMomentFormat: 'YYYY-MM-DD',
                sortable: ['id', 'nombre'],
                filterable: false, //OCULTA FILTRO
                headings: {
                        id: 'ID',
                        nombre: 'NOMBRE',
                        descripcion: 'DESCRIPCION',
                        precio: 'PRECIO €',
                        'created_at': 'CREACIÓN',
                        'updated_at': 'ACTUALIZACIÓN',
                        'acciones': 'ACCIONES'
                    },
                orderBy: {
                    column: 'nombre',
                    ascending: true
                },
                pagination: { chunk:10,dropdown:false,nav: 'scroll'},
                sortIcon: {
                    base: 'icon',
                    up: 'icon-sort-up',
                    down: 'icon-sort-down',
                    is: 'icon-sort'
                },
                perPage:10,
                // texts: {
                //         filter: "",
                //         filterPlaceholder: "Filtrar resultados",
                //         // filterBy: 'Filtrar por {razon_social}',
                //         count:' '
                //     },
                columnsDropdown: false, //permite que el user elija que columnas ver.
            }
        }
    },
    props: [
        'productos'
    ],
    created() {
        console.log('vue')
    },
    methods: {
        toggler(){
            console.log('togglerrrr');
            this.isActive = !this.isActive;
            this.nuevo.nombre = '';
            this.nuevo.descripcion = '';
            this.nuevo.precio = '';
            $('#nombre').focus();
        },
        toggler2(){
            this.isEditing = !this.isEditing;
        },
        crear(){
            console.log(this.nuevo.nombre + ' ' + this.nuevo.descripcion + ' ' + this.nuevo.precio)
            var url='/productos/';
                axios.post(url, {
                    nombre: this.nuevo.nombre,
                    descripcion: this.nuevo.descripcion,
                    precio: this.nuevo.precio,
                }).then(response => {
                    if(response.errors){
                        this.$notification.error("mierda!", {  timer: 2, position:'topRigth' });

                    }else{
                        this.productos = response.data;
                        this.$notification.success("Producto creado correctamente!", {  timer: 2, position:'topRigth' });
                        this.isActive = false;
                        this.nuevo.nombre = '';
                        this.nuevo.descripcion = '';
                        this.nuevo.precio = '';
                    }
                });
        },
        editar(id){
            console.log('editttt');
            console.log(id);
            this.isEditing = !this.isEditing;
            this.editado.id = this.productos.find(x => x.id === id).id;
            this.editado.nombre = this.productos.find(x => x.id === id).nombre;
            console.log(this.editado.id);
            this.editado.descripcion = this.productos.find(x => x.id === id).descripcion;
            this.editado.precio = this.productos.find(x => x.id === id).precio;
        },
        actualizar(id){
            // console.log(this.editado.id);
            // console.log(this.editado.nombre);
            // console.log(this.editado.descripcion);
            // console.log(this.editado.precio);
            var url='/productoeditar/' + id;
            // console.log(url);
            
            axios.patch(url, {
                id: this.editado.id,
                nombre: this.editado.nombre,
                descripcion: this.editado.descripcion,
                precio: this.editado.precio,
                _method: 'patch'
            }).then(response => {
                console.log(response.error);
                if(response.error){
                    this.$notification.error("response.error", {  timer: 3, position:'topRigth' });
                }else{
                    this.$notification.success("Producto actualizado correctamente!", {  timer: 3, position:'topRigth' });
                    // this.productos = response.data;
                    this.isEditing = false;
                    this.editado.nombre = '';
                    this.editado.descripcion = '';
                    this.editado.precio = '';
                }
            });
        },
        eliminar(id){   //Envía http request a la URL dada. Le envía el id del cliente seleccionado para que el método del controlador lo elimine (soft) de la bd
            if(confirm("Estás seguro de eliminar?")){

                var url='/productos/' + id;
                axios.delete(url).then(response => {
                    console.log(response.error);
                    if(response.error){
                        this.$notification.error("response.error", {  timer: 3, position:'topRigth' });
                    }else{
                        this.$notification.success("Producto eliminado correctamente!", {  timer: 3, position:'topRigth' });
                        this.productos = response.data;

                    }
                });
            }
        }
    }
}
</script>

<style>
.VueTables__child-row-toggler {
    width: 16px;
    height: 16px;
    line-height: 16px;
    display: block;
    margin: auto;
    text-align: center;
}
 
.VueTables__child-row-toggler--closed::before {
    content: "+";
}
 
.VueTables__child-row-toggler--open::before {
    content: "-";
}
.menu-contain {
  width: 100%;
  height: 0px;
  background-color: #09333C;
  transition: all 0.5s linear;
}

.active {
  width: 100%;
  height: 300px;
  background-color: #8BAFB5;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.5s linear;
}
.espacios {
    margin-top: 10px;
    margin-bottom: 10px;
}
.VueTables{
    padding-left: 0px;
}
</style>