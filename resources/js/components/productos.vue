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
                <input type="text" name="nombre" id="nombre" 
                                    v-model="nuevo.nombre"
                                    placeholder="nombre"
                                    @focusout="controlNombre(nuevo.nombre)">
                <input type="text" name="descripcion" id="descripcion"
                                    v-model="nuevo.descripcion"
                                    placeholder="descripcion"
                                    @focusout="controlDescripcion(nuevo.descripcion)">
                <input type="number" name="precio" id="precio"
                                    v-model="nuevo.precio"
                                    placeholder="precio"
                                    @focusout="controlPrecio(nuevo.precio)"
                                    step="0.01"
                                    min="0.00"
                                    value="0.00">
                <input type="text" name="unidadv" id="unidad"
                                    v-model="nuevo.unidad"
                                    placeholder="unidad precio"
                                    @focusout="controlUnidad(nuevo.unidad)">
                <button title="crear" class="btn btn-success" @click="crear" >Crear</button>
                <button title="crear" class="btn btn-danger" @click="isActive = !isActive" >Cancelar</button>
            </label>
        </div>

    <div class="col-md-12 espacios" v-if="isEditing">
        <label><strong>Editando producto:</strong></br>
            <input type="text" name="idEdit" id="idEdit"
                                v-model="editado.id"
                                value="editado.id"
                                readonly
                                disabled>
            <input type="text" name="nombreEdit" id="nombre"
                                v-model="editado.nombre"
                                value="editado.nombre"
                                @focusout="controlNombre(editado.nombre)">
            <input type="text" name="descripcion" id="descripcion"
                                v-model="editado.descripcion"
                                value="editado.descripcion"
                                @focusout="controlDescripcion(editado.descripcion)">
            <input type="number" name="precio" id="precio"
                                v-model="editado.precio"
                                value="editado.precio"
                                @focusout="controlPrecio(editado.precio)"
                                step="0.01"
                                min="0.00">
            <input type="text" name="unidad" id="unidad"
                                v-model="editado.unidad"
                                value="editado.unidad"
                                @focusout="controlUnidad(editado.unidad)">
            <button title="crear" class="btn btn-success" @click="actualizar(editado.id)" >Actualizar</button>
            <button title="crear" class="btn btn-danger" @click="isEditing = !isEditing" >Cancelar</button>
        </label>
    </div>

        <div class="col-md-12 espacios">
            <v-client-table ref="tabla" class="col-md-12" :data="misProductos" :columns="columns" :options="options">
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
            misProductos: this.productos, //necesario pq no se puede modif la prop de padre por hijo
            isActive: false,
            isEditing: false,
            nuevo: {
                nombre: '',
                descripcion:'',
                precio:'',
                unidad:''
            },
            editado: {
                id: '',
                nombre: '',
                descripcion:'',
                precio:'',
                unidad:''
            },
            errors: '',
            //para la tabla
            columns: ['id', 'nombre', 'descripcion', 'precio', 'unidad', 'created_at', 'updated_at', 'acciones'],
            
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
                        unidad: 'UNIDAD',
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
                texts: {
                        // filter: "",
                        // filterPlaceholder: "Filtrar resultados",
                        // filterBy: 'Filtrar por {razon_social}',
                        count:' ' //oculta contador
                    },
                columnsDropdown: false, //permite que el user elija que columnas ver.
            }
        }
    },
    props: [
        'productos'
    ],
    methods: {
        //VALIDACIONES
        controlNombre(nombre){
            if(!nombre){
                this.$notification.error("NOMBRE: Campo obligatorio", {  timer: 2, position:'topRigth' });
                $('#nombre').focus();
            }
            if(nombre.length > 20){
                this.$notification.error("NOMBRE: Máximo 20 caracteres", {  timer: 2, position:'topRigth' });
                $('#nombre').focus();
            }
        },
        controlDescripcion(descripcion){
            if(descripcion.length > 50){
                this.$notification.error("DESCRIPCION: Máximo 50 caracteres", {  timer: 2, position:'topRigth' });
                $('#descripcion').focus();
            }
        },
        controlPrecio(precio){
            if(!precio){
                this.$notification.error("PRECIO: Campo obligatorio", {  timer: 2, position:'topRigth' });
                $('#precio').focus();
            }
        },
        controlUnidad(unidad){
            if(unidad.length > 10){
                this.$unidad.error("UNIDAD: Máximo 10 caracteres", {  timer: 2, position:'topRigth' });
                $('#unidad').focus();
            }
        },
        //CONTROL PARA DATOS NUEVO
        toggler(){
            this.isActive = !this.isActive;
            this.nuevo.nombre = '';
            this.nuevo.descripcion = '';
            this.nuevo.precio = '';
            this.nuevo.unidad = '';
        },
        //ENVÍO DATOS NUEVOS PARA GUARDAR EN BD
        crear(){
            console.log(this.nuevo.nombre + ' ' + this.nuevo.descripcion + ' ' + this.nuevo.precio + ' ' + this.nuevo.unidad)
            var url='/productos/';
                axios.post(url, {
                    nombre: this.nuevo.nombre,
                    descripcion: this.nuevo.descripcion,
                    precio: this.nuevo.precio,
                    unidad: this.nuevo.unidad
                }).then(response => {
                    console.log(response);
                    this.$notification.success("Producto creado correctamente!", {  timer: 2, position:'topRigth' });
                    this.misProductos = response.data;
                    this.errors=[];
                    this.toggler();
                }).catch((error) => {
                    console.log(typeof error); // error = Error object
                    if(error.response.status == 422){
                        this.errors = error.response.data.errors;
                        console.log(this.errors);
                        if(this.errors.nombre) {
                            this.errors.nombre.forEach(element => {
                                this.$notification.error(element, {  timer: 4, position:'topRigth' });
                            });
                        }
                        if(this.errors.descripcion) {
                            this.errors.descripcion.forEach(element => {
                                this.$notification.error(element, {  timer: 4, position:'topRigth' });
                            });
                        }
                        if(this.errors.precio) {
                            this.errors.precio.forEach(element => {
                                this.$notification.error(element, {  timer: 4, position:'topRigth' });
                            });
                        }
                        if(this.errors.unidad) {
                            this.errors.unidad.forEach(element => {
                                this.$notification.error(element, {  timer: 4, position:'topRigth' });
                            });
                        }
                    }
                });
        },
        //MOSTRAR DATOS A EDITAR
        editar(id){
            console.log(this.editado)
            // this.isEditing = !this.isEditing; NO VALE! PORQUE SI PULSA EDITAR UNO, Y LUEGO OTRO, LO QUE HACE ES OCULTAR EL 2º.... :/
            this.isEditing = true;
            this.editado.id = this.productos.find(x => x.id === id).id;
            this.editado.nombre = this.productos.find(x => x.id === id).nombre;
            this.editado.descripcion = this.productos.find(x => x.id === id).descripcion;
            this.editado.precio = this.productos.find(x => x.id === id).precio;
            this.editado.unidad = this.productos.find(x => x.id === id).unidad;
        },
        //ENVÍO DATOS EDITADOS PARA GUARDAR EN BD
        actualizar(id){
            var url='/productoeditar/' + id;
            axios.post(url, {
                id: this.editado.id,
                nombre: this.editado.nombre,
                descripcion: this.editado.descripcion,
                precio: this.editado.precio,
                unidad: this.editado.unidad
            }).then(response => {
                console.log(response);
                this.$notification.success("Producto actualizado correctamente!", {  timer: 2, position:'topRigth' });
                this.misProductos = response.data;
                this.errors=[];
                this.isEditing = !this.isEditing;
                this.editado.nombre = '';
                this.editado.descripcion = '';
                this.editado.precio = '';
                this.editado.unidad = '';
            }).catch((error) => {
                console.log(typeof error); // error = Error object
                if(error.response.status == 422){
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                    if(this.errors.nombre) {
                        this.errors.nombre.forEach(element => {
                            this.$notification.error(element, {  timer: 4, position:'topRigth' });
                        });
                    }
                    if(this.errors.descripcion) {
                        this.errors.descripcion.forEach(element => {
                            this.$notification.error(element, {  timer: 4, position:'topRigth' });
                        });
                    }
                    if(this.errors.precio) {
                        this.errors.precio.forEach(element => {
                            this.$notification.error(element, {  timer: 4, position:'topRigth' });
                        });
                    }
                    if(this.errors.unidad) {
                        this.errors.unidad.forEach(element => {
                            this.$notification.error(element, {  timer: 4, position:'topRigth' });
                        });
                    }
                }
            });
        },
        eliminar(id){   //Envía http request a la URL dada. Le envía el id del cliente seleccionado para que el método del controlador lo elimine (soft) de la bd
            if(confirm("Estás seguro de eliminar?")){

                var url='/productos/' + id;
                console.log('eliminando: '+id)
                axios.delete(url)
                .then(response => {
                    console.log(response);
                    this.$notification.success("Producto eliminado correctamente!", {  timer: 2, position:'topRigth' });
                    this.misProductos = response.data;
                }).catch((error) => {
                    console.log(error);
                    this.$notification.error(error, {  timer: 4, position:'topRigth' });
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
.VueTables__limit {
display: none;
}

/* mío */
.espacios {
    margin-top: 10px;
    margin-bottom: 10px;
}
.VueTables{
    padding-left: 0px;
}
</style>