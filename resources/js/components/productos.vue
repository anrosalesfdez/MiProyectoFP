<template>
    <div class="row justify-content-center" id="productos">
        <notifications classes="my-style" position="top right"/>

      
        <div class="col-md-12 espacios">
            <h3>Mantenimiento de Productos</h3>
            <button v-if="botonCrear" class="nuevaPag" @click="toggler">
                <i class="material-icons">control_point</i>
                Nuevo producto
            </button>
        </div>
        
        <div class="col-md-12 espacios" v-if="isCreating">
            <p><strong>Nuevo producto:</strong></p>
            <div class="form-row">    
                <div class="form-group col-md-3">
                    <label for="nombre" class="col-form-label">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" 
                                    v-model="nuevo.nombre"
                                    placeholder="nombre">
                </div>
                <div class="form-group col-md-3">
                    <label for="descripcion" class="col-form-label">Descripción: </label>
                    <input type="text" name="descripcion" id="descripcion"
                                    v-model="nuevo.descripcion"
                                    placeholder="descripcion">
                </div>
            </div>
            <div class="form-row">    
                <div class="form-group col-md-3">
                    <label for="precio" class="col-form-label">Precio: </label>
                    <input type="number" name="precio" id="precio"
                                    v-model="nuevo.precio"
                                    placeholder="precio"
                                    step="0.01"
                                    min="0.00"
                                    value="0.00">
                </div>
                <div class="form-group col-md-3">
                    <label for="unidad" class="col-form-label">Unidad: </label>
                    <input type="text" name="unidad" id="unidad"
                                    v-model="nuevo.unidad"
                                    placeholder="unidad">
                </div>
            </div>
            <div class="form-row">    
                <div class="form-group col-md-4">
                    <select class="custom-select custom-select-sm" id="actividad" data-width="auto"
                                    v-model="actividad">
                        <option disabled value="null">Código CNAE actividad</option>
                        <option v-for="actividad in actividades" :key="actividad.id" :value="actividad" @change="actividadData"> {{ actividad.codigo }} - {{ actividad.titulo }} </option>
                    </select>
                </div>
            </div>
            <div>
                <button title="crear" class="crearButton" @click="crear" >Crear</button>
                <button title="crear" class="cancelarButton" @click="cancelar" >Cancelar</button>
            </div>
        </div>

        <div class="col-md-12 espacios" v-if="isEditing">
            <p><strong>Editando producto:</strong></p>
            <input type="hidden" name="idEdit" id="idEdit"
                v-model="editado.id">
            <div class="form-row">    
                <div class="form-group col-md-3">
                    <label for="nombre" class="col-form-label">Nombre: </label>
                    <input type="text" name="nombreEdit" id="nombre"
                                        v-model="editado.nombre"
                                        value="editado.nombre">
                </div>
                <div class="form-group col-md-3">
                    <label for="nombre" class="col-form-label">Descripción: </label>
                    <input type="text" name="descripcion" id="descripcion"
                                        v-model="editado.descripcion"
                                        value="editado.descripcion">
                </div>
            </div>
            <div class="form-row">    
                <div class="form-group col-md-3">
                    <label for="nombre" class="col-form-label">Precio: </label>
                    <input type="number" name="precio" id="precio"
                                        v-model="editado.precio"
                                        value="editado.precio"
                                        step="0.01"
                                        min="0.00">
                </div>
                <div class="form-group col-md-3">
                    <label for="nombre" class="col-form-label">Unidad: </label>
                    <input type="text" name="unidad" id="unidad"
                                        v-model="editado.unidad"
                                        value="editado.unidad">
                </div>
            </div>
            <div class="form-row">    
                <div class="form-group col-md-4">
                    <label for="nombre" class="col-form-label">Código CNAE actividad: </label>
                    <!-- <span>{{ getCnae(editado.id)}}</span> -->
                    <input type="text" name="actividadPto" id="actividadPto" size="50"
                                        v-model="actividadPto"
                                        readonly
                                        disabled>
                    
                </div>
            </div>

            <div style="padding: 15px 0px;">
                <button title="crear" class="crearButton" @click="actualizar(editado.id)" >Actualizar</button>
                <button title="crear" class="cancelarButton" @click="isEditing = !isEditing; botonCrear= !botonCrear" >Cancelar</button>
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
            isCreating: false, //div crear producto
            isEditing: false, //div editar producto
            botonCrear: true, //botón nuevo producto
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
        'productos',
        'actividades',
    ],
    computed: {
        actividadPto:{
            get(){
                return this.actividades.find(act => act.id == this.editado.actividades_id).titulo;
            },
            set(){

            },
            
        },
    },
    created: function(){
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

        //VALIDA EN CLIENTE. Se ejecutan todas de golpe al click en crear/actualizar
        //si se superan (this.validado =''), se envía la petición AJAX
        controlNombre(nombre){
            if(!nombre)
                this.validado = "NOMBRE: Campo obligatorio<br>";
            if(nombre.length > 20)
                this.validado += "NOMBRE: Máximo 20 caracteres<br>";
        },
        controlDescripcion(descripcion){
            if(descripcion.length > 50)
                this.validado += "DESCRIPCION: Máximo 50 caracteres<br>";
        },
        controlPrecio(precio){
            if(!precio)
                this.validado += "PRECIO: Campo obligatorio<br>";
        },
        controlUnidad(unidad){
            if(!unidad)
                this.validado += "UNIDAD: Campo obligatorio<br>";
            if(unidad.length > 10)
                this.validado += "UNIDAD: Máximo 10 caracteres<br>";
        },
        controlActividad(actividades_id){
            if(!actividades_id)
                this.validado += "ACTIVIDAD CNAE: Campo obligatorio<br>";
        },
        //VALIDA EN SERVIDOR. Se ejecutan en caso de que el servidor devuelva un error 422
        validarServer(errors){
            let campos = ['nombre', 'descripcion', 'precio', 'unidad', 'actividades_id'];
            let validadoServer = '';
            campos.forEach(element =>{
                if(errors[element]) {
                    errors[element].forEach(element => {
                        console.log(element)
                        validadoServer += element+"<br>";
                    })
                }
            })
            return validadoServer;
        },
        //MUESTRA u OCULTA DIV CON INPUTS PARA NUEVO PRODUCTO => evento de botonCrear
        toggler(){
            this.isCreating = !this.isCreating; //mostrar div
            this.nuevo.nombre = '';
            this.nuevo.descripcion = '';
            this.nuevo.precio = '';
            this.nuevo.unidad = '';
            this.nuevo.actividades_id='';
            this.nuevo.actividades_impuesto='';
            this.actividad=null;
            this.botonCrear = false;//ocultar buttonc crear!
        },
        //ENVÍA A SERVIDOR PETICIÓN AJAX CON DATOS DE NUEVO PRODUCTO PARA GUARDAR EN BD
        crear(){
            //recoge valores:
            if(this.actividad){
                this.nuevo.actividades_id = this.actividad.id;
                this.nuevo.actividades_impuesto = this.actividad.impuesto;
            }
            //Ejecuta validaciones en cliente
            this.validado=''; //blanquea
            this.controlNombre(this.nuevo.nombre);
            this.controlDescripcion(this.nuevo.descripcion);
            this.controlPrecio(this.nuevo.precio);
            this.controlUnidad(this.nuevo.unidad);
            this.controlActividad(this.nuevo.actividades_id);
            if(this.validado !== ''){
                this.$notify({
                    title: 'ERRORES DETECTADOS',
                    text: this.validado,
                    type: 'error',
                    
                });
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
                this.$notify({
                    text: 'Producto creado correctamente',
                    type: 'success',
                });
                this.misProductos = response.data;
                this.toggler();
                this.botonCrear = true; //sobreescribe comportamiento de toggler()

            }).catch((error) => { //(error) es el param que le paso a la funcion anónima
                console.log(error); // error = Error object
                if(error.response.status == 422){
                    let validadoServer = this.validarServer(error.response.data.errors);
                    if(validadoServer!==''){
                        this.$notify({
                            text: validadoServer,
                            type: 'error',
                        });
                    }
                        // this.$notification.error(validadoServer, {  timer: 4, position:'topRigth' });
                }else{
                    this.$notify({
                        text: error.response.data.errors,
                        type: 'error',
                    });
                }
            });
        },
        cancelar(){
            this.isCreating = !this.isCreating;
            this.botonCrear = true;
        },
        //MUESTRA DIV CON DATOS DEL PRODUCTO A EDITAR
        editar(id){
            console.log(this.editado)
            // this.isEditing = !this.isEditing; NO VALE! PORQUE SI PULSA EDITAR UNO, Y LUEGO OTRO, LO QUE HACE ES OCULTAR EL 2º.... :/
             window.scrollTo(0,0);
            this.isEditing = true; //muestra div editar
            this.isCreating = false;
            //
            this.editado.id = this.misProductos.find(x => x.id === id).id;
            this.editado.nombre = this.misProductos.find(x => x.id === id).nombre;
            this.editado.descripcion = this.misProductos.find(x => x.id === id).descripcion;
            this.editado.precio = this.misProductos.find(x => x.id === id).precio;
            this.editado.unidad = this.misProductos.find(x => x.id === id).unidad;
            this.editado.actividades_id = this.misProductos.find(x => x.id === id).actividades_id;
            this.editado.users_id = this.misProductos.find(x => x.id === id).users_id;

            this.botonCrear = !this.botonCrear; //muestra botón de crear producto

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
                this.$notify({
                    text: this.validado,
                    type: 'error',
                });
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

            }).catch((error) => {
                if(error.response.status == 422){
                    let validadoServer = this.validarServer(error.response.data.errors);
                    if(validadoServer!=='')
                        this.$notify({
                            text: validadoServer,
                            type: 'error',
                        });
                }else{
                    this.$notify({
                        text: error.response.data.errors,
                        type: 'error',
                    });
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
                    this.$notify({
                        text: 'Producto eliminado correctamente',
                        type: 'success',
                    });
                    this.misProductos = response.data;
                }).catch((error) => {
                    console.log(error);
                    this.$notify({
                        text: error,
                        type: 'error',
                    });
                });
            }
        }
    }
}
</script>
