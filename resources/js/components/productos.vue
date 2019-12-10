<template>
    <div class="row justify-content-center">
      
        <div class="col-md-12 espacios">
            <h3>Mantenimiento de Productos</h3>
            <button v-if="mostrarCrear" class="nuevaPag" @click="toggler">
                <i class="material-icons">control_point</i>
                Nuevo producto
                <!-- <span class="oi oi-plus"></span> -->
            </button>
        </div>
        
        <div class="col-md-12 espacios" v-if="isActive">
            <p><strong>Nuevo producto:</strong></p>
            <input type="text" name="nombre" id="nombre" 
                                v-model="nuevo.nombre"
                                placeholder="nombre">
            <input type="text" name="descripcion" id="descripcion"
                                v-model="nuevo.descripcion"
                                placeholder="descripcion">
            <input type="number" name="precio" id="precio"
                                v-model="nuevo.precio"
                                placeholder="precio"
                                step="0.01"
                                min="0.00"
                                value="0.00">
            <input type="text" name="unidad" id="unidad"
                                v-model="nuevo.unidad"
                                placeholder="unidad">
            <select class="form-control-plaintext editable" id="actividad" 
                                v-model="actividad">
                <option disabled value="null">Código CNAE actividad</option>
                <option v-for="actividad in actividades" :key="actividad.id" :value="actividad" @change="actividadData"> {{ actividad.codigo }} - {{ actividad.titulo }} </option>
            </select>
            <button title="crear" class="crearButton" @click="crear" >Crear</button>
            <button title="crear" class="cancelarButton" @click="isActive = !isActive" >Cancelar</button>
        </div>

        <div class="col-md-12 espacios" v-if="isEditing">
            <p><strong>Editando producto:</strong></p>
            <input type="hide" name="idUser" id="idUser"
                v-model="editado.users_id">
            <input type="text" name="idEdit" id="idEdit" class="col-md-1"
                                v-model="editado.id"
                                value="editado.id"
                                readonly
                                disabled>
            <input type="text" name="nombreEdit" id="nombre"
                                v-model="editado.nombre"
                                value="editado.nombre">
            <input type="text" name="descripcion" id="descripcion"
                                v-model="editado.descripcion"
                                value="editado.descripcion">
            <input type="number" name="precio" id="precio"
                                v-model="editado.precio"
                                value="editado.precio"
                                step="0.01"
                                min="0.00">
            <input type="text" name="unidad" id="unidad"
                                v-model="editado.unidad"
                                value="editado.unidad">
            <input type="text" name="actividades_id" id="actividades_id"
                                v-model="editado.actividades_id"
                                value="editado.actividades_id"
                                readonly
                                disabled>
            <div style="padding: 15px 0px;">
                <button title="crear" class="crearButton" @click="actualizar(editado.id)" >Actualizar</button>
                <button title="crear" class="cancelarButton" @click="isEditing = !isEditing; mostrarCrear= !mostrarCrear" >Cancelar</button>
            </div>
        </div>

        <div class="col-md-12 espacios">
            <v-client-table ref="tabla" class="col-md-12" :data="misProductos" :columns="columns" :options="options">
                <div slot="cnae" slot-scope="props" style="display: inline">
                {{ getCnae(props.row.id) }}
                </div>
                <div slot="acciones" slot-scope="props" style="display: inline">
                    <button title="editar" class="btn btn-xs" @click="editar(props.row.id)" >
                        <i class="material-icons iconosEdicion">edit</i>
                    </button>
                    <button title="eliminar" class="btn btn-xs" @click="eliminar(props.row.id)">
                        <i class="material-icons iconosEdicion">delete</i>
                    </button>
                </div>
            </v-client-table> 
        </div>
        
    </div>
</template>

<script>
//TODO:salto de línea en errores servidorbundleRenderer.renderToStream
export default {
    data(){
        return{
            misProductos: this.productos, //necesario pq no se puede modif la prop de padre por hijo
            isActive: false, //div crear producto
            isEditing: false, //div editar producto
            mostrarCrear: true, //botón nuevo producto
            nuevo: {
                nombre: '',
                descripcion:'',
                precio:'',
                unidad:'',
                actividades_id:'',
                actividades_impuesto:'',
            },
            editado: {
                id: '',
                nombre: '',
                descripcion:'',
                precio:'',
                unidad:'',
                actividades_id:'',
            },
            actividades: [],
            actividad: {
                id:'',
                codigo:'',
                titulo:'',
                descripcion:'',
                serie:'',
                impuesto:'',
                // impuesto:''
            },
            validado: '', //recoge mensajes de errores front end y back end en caso de haberlos.
            cnae:'',
            //para la tabla
            columns: ['nombre', 'descripcion', 'precio', 'unidad', 'cnae', 'acciones'],
            
            filterByColumn: false,

            options:{
                sortable: ['nombre', 'precio', 'unidad', 'cnae'],
                filterable: false, //OCULTA FILTRO
                headings: {
                        nombre: 'NOMBRE',
                        descripcion: 'DESCRIPCION',
                        precio: 'PRECIO €',
                        unidad: 'UNIDAD',
                        'cnae': 'CNAE',
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
    computed: { //TOFIX 
        // cnaeCode: function(actividad_id){
        //     return this.actividades.find(actividad => actividad.id === actividad_id).codigo;
        // }
    },
    created: function(){
        this.getActividades();

    },
    methods: {
        actividadData(){
            console.log('actividad data....');
            
        },
        getCnae(idPto){
            let actividad = this.misProductos.find(x => x.id == idPto).actividades_id;
                            // this.misProductos.find(x => x.id === id).actividdes_id;
            console.log(actividad);
            return this.actividades.find(x => x.id == actividad).titulo;
        },
        getActividades(){
            let url = "/actividades";
            axios.get(url).then(response => {
                this.actividades = response.data;
                console.log(this.actividades);
            }).catch((error) => {
                console.log(error);
            });
        },
        //VALIDA EN CLIENTE. Se ejecutan todas de golpe al click en crear/actualizar
        //si se superan (this.validado =''), se envía la petición AJAX
        controlNombre(nombre){
            if(!nombre)
                this.validado = "NOMBRE: Campo obligatorio\n";
            if(nombre.length > 20)
                this.validado += "NOMBRE: Máximo 20 caracteres\n";
        },
        controlDescripcion(descripcion){
            if(descripcion.length > 50)
                this.validado += "DESCRIPCION: Máximo 50 caracteres\n";
        },
        controlPrecio(precio){
            if(!precio)
                this.validado += "PRECIO: Campo obligatorio\n";
        },
        controlUnidad(unidad){
            if(!unidad)
                this.validado += "UNIDAD: Campo obligatorio\n";
            if(unidad.length > 10)
                this.validado += "UNIDAD: Máximo 10 caracteres\n";
        },
        controlActividad(actividades_id){
            if(!actividades_id)
                this.validado += "ACTIVIDAD CNAE: Campo obligatorio\n";
        },
        //VALIDA EN SERVIDOR. Se ejecutan en caso de que el servidor devuelva un error 422
        validarServer(errors){
            let campos = ['nombre', 'descripcion', 'precio', 'unidad', 'actividades_id'];
            let validadoServer = '';
            campos.forEach(element =>{
                if(errors[element]) {
                    errors[element].forEach(element => {
                        console.log(element)
                        validadoServer += element+"\n";
                    })
                }
            })
            return validadoServer;
        },
        //MUESTRA u OCULTA DIV CON INPUTS PARA NUEVO PRODUCTO
        toggler(){
            this.isActive = !this.isActive; //mostrar div
            this.nuevo.nombre = '';
            this.nuevo.descripcion = '';
            this.nuevo.precio = '';
            this.nuevo.unidad = '';
            this.nuevo.actividades_id='';
            this.nuevo.actividades_impuesto='';
            this.actividad=null;
        },
        //ENVÍA A SERVIDOR PETICIÓN AJAX CON DATOS DE NUEVO PRODUCTO PARA GUARDAR EN BD
        crear(){
            //recoge valores:
            this.nuevo.actividades_id = this.actividad.id;
            this.nuevo.actividades_impuesto = this.actividad.impuesto;
            //Ejecuta validaciones en cliente
            this.validado=''; //blanquea
            this.controlNombre(this.nuevo.nombre);
            this.controlDescripcion(this.nuevo.descripcion);
            this.controlPrecio(this.nuevo.precio);
            this.controlUnidad(this.nuevo.unidad);
            this.controlActividad(this.nuevo.actividades_id);
            if(this.validado !== ''){
                this.$notification.error(this.validado, {  timer: 4, position:'topRigth' });
                return;
            }
            //si no hubo errores, envía AJAX
            let url='/productos/';
            axios.post(url, {
                nombre: this.nuevo.nombre,
                descripcion: this.nuevo.descripcion,
                precio: this.nuevo.precio,
                unidad: this.nuevo.unidad,
                actividades_id: this.nuevo.actividades_id,
                actividades_impuesto: this.nuevo.actividades_impuesto
            }).then(response => {
                console.log(response);
                this.$notification.success("Producto creado correctamente!", {  timer: 4, position:'topRigth' });
                this.misProductos = response.data;
                this.toggler();
                // location.reload(); //para que carguen bien las fechas...

            }).catch((error) => { //(error) es el param que le paso a la funcion anónima
                console.log(error); // error = Error object
                if(error.response.status == 422){
                    let validadoServer = this.validarServer(error.response.data.errors);
                    if(validadoServer!=='')
                        this.$notification.error(validadoServer, {  timer: 4, position:'topRigth' });
                }else{
                    this.$notification.error(error.response.data.errors, {  timer: 4, position:'topRigth' });
                }
            });
        },
        
        //MUESTRA DIV CON DATOS DEL PRODUCTO A EDITAR
        editar(id){
            console.log(this.editado)
            // this.isEditing = !this.isEditing; NO VALE! PORQUE SI PULSA EDITAR UNO, Y LUEGO OTRO, LO QUE HACE ES OCULTAR EL 2º.... :/
            this.isEditing = true; //muestra div editar
            //
            this.editado.id = this.misProductos.find(x => x.id === id).id;
            this.editado.nombre = this.misProductos.find(x => x.id === id).nombre;
            this.editado.descripcion = this.misProductos.find(x => x.id === id).descripcion;
            this.editado.precio = this.misProductos.find(x => x.id === id).precio;
            this.editado.unidad = this.misProductos.find(x => x.id === id).unidad;
            this.editado.actividades_id = this.misProductos.find(x => x.id === id).actividades_id;
            this.editado.users_id = this.misProductos.find(x => x.id === id).users_id;

            this.mostrarCrear = !this.mostrarCrear; //muestra botón de crear producto

        },
        //ENVÍA A SERVIDOR PETICIÓN AJAX CON DATOS DE PRODUCTO EDITADO PARA GUARDAR EN BD
        actualizar(id){
            //Ejecuta validaciones en cliente
            this.validado=''; //blanquea
            this.controlNombre(this.editado.nombre);
            this.controlDescripcion(this.editado.descripcion);
            this.controlPrecio(this.editado.precio);
            this.controlUnidad(this.editado.unidad);
            this.controlActividad(this.editado.actividades_id);
            if(this.validado !== ''){
                this.$notification.error(this.validado, {  timer: 4, position:'topRigth' });
                return;
            }
            //si no hubo errores, envía AJAX
            var url='/productoEditar/' + id;
            axios.post(url, {
                id: this.editado.id,
                nombre: this.editado.nombre,
                descripcion: this.editado.descripcion,
                precio: this.editado.precio,
                unidad: this.editado.unidad,
                actividades_id: this.editado.actividades_id,
                users_id: this.editado.users_id,
            }).then(response => {
                console.log(response);
                this.$notification.success("Producto actualizado correctamente!", {  timer: 4, position:'topRigth' });
                this.misProductos = response.data;
                this.isEditing = !this.isEditing;
                this.editado.nombre = '';
                this.editado.descripcion = '';
                this.editado.precio = '';
                this.editado.unidad = '';
                this.editado.actividades_id = '';
                // location.reload(); //para que carguen bien las fechas...

            }).catch((error) => {
                if(error.response.status == 422){
                    let validadoServer = this.validarServer(error.response.data.errors);
                    if(validadoServer!=='')
                        this.$notification.error(validadoServer, {  timer: 4, position:'topRigth' });
                }else{
                    this.$notification.error(error.response.data.errors, {  timer: 4, position:'topRigth' });
                }
             
            });
        },
        //ENVÍA PETICIÓN AJAX PARA ELIMINAR PRODUCTO SELECCIONADO.
        eliminar(id){   
            if(confirm("Estás seguro de eliminar?")){
                let url='/productos/' + id;
                console.log('eliminando: '+id)
                axios.delete(url)
                .then(response => {
                    console.log(response);
                    this.$notification.success("Producto eliminado correctamente!", {  timer: 4, position:'topRigth' });
                    this.misProductos = response.data;
                    location.reload(); //para que carguen bien las fechas...
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