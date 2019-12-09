<template>
    <div class="row justify-content-center card">
      
        <div class="card-header">
            <h3 style="display: inline">Configuración de emisor facturas</h3>
            <div style="display: inline; float: right">
                <button class="crearButton" @click="actualizar(usuariofactbd.id)">
                    Actualizar
                </button>
                <a href="/dashboard" class="cancelarButton">
                    Cancelar
                </a>
            </div>
        </div>
        
        <div class="card-body espacios">
            <form>
                <fieldset>
                    <legend>Información fiscal</legend>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="nif" class="col-form-label">NIF: </label>
                            <input type="text" name="nif" id="nif"  class="form-control" 
                                                v-model="usuariofactura.nif"
                                                value="usuariofactura.nif">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="niva" class="col-form-label">NIVA: </label>
                            <input type="text" name="apellido1" id="niva"  class="form-control" 
                                                v-model="usuariofactura.niva"
                                                value="usuariofactura.niva">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre_fiscal" class="col-form-label">Nombre fiscal: </label>
                            <input type="text" name="nombre_fiscal" id="nombre_fiscal"  class="form-control" 
                                                v-model="usuariofactura.nombre_fiscal"
                                                value="usuariofactura.nombre_fiscal">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="direccion_fiscal" class="col-form-label">Dirección fiscal: </label>
                            <input type="text" name="direccion_fiscal" id="direccion_fiscal"  class="form-control" 
                                                v-model="usuariofactura.direccion_fiscal"
                                                value="usuariofactura.direccion_fiscal">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="cp_fiscal" class="col-form-label">Código postal: </label>
                            <input type="text" name="cp_fiscal" id="cp_fiscal"  class="form-control" 
                                                v-model="usuariofactura.cp_fiscal"
                                                value="usuariofactura.cp_fiscal">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="provincia_fiscal" class="col-form-label">Ciudad: </label>
                            <input type="text" name="provincia_fiscal" id="provincia_fiscal"  class="form-control" 
                                                v-model="usuariofactura.provincia_fiscal"
                                                value="usuariofactura.provincia_fiscal">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pais_fiscal" class="col-form-label">País: </label>
                            <input type="text" name="pais_fiscal" id="pais_fiscal"  class="form-control" 
                                                v-model="usuariofactura.pais_fiscal"
                                                value="usuariofactura.pais_fiscal">
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Información comercial</legend>
                    <div class="form-row">    
                        <div class="form-group col-md-6">
                            <label for="nombre_comercial" class="col-form-label">Nombre comercial: </label>
                            <input type="text" name="nombre_comercial" id="nombre_comercial"  class="form-control" 
                                                v-model="usuariofactura.nombre_comercial"
                                                value="usuariofactura.nombre_comercial">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="direccion_comercial" class="col-form-label">Dirección comercial: </label>
                            <input type="text" name="direccion_comercial" id="direccion_fiscal"  class="form-control" 
                                                v-model="usuariofactura.direccion_comercial"
                                                value="usuariofactura.direccion_comercial">
                        </div>
                    </div>
                    <div class="form-row"> 
                        <div class="form-group col-md-2">
                            <label for="cp_comercial" class="col-form-label">Código postal: </label>
                            <input type="text" name="cp_comercial" id="cp_fiscal"  class="form-control" 
                                                v-model="usuariofactura.cp_comercial"
                                                value="usuariofactura.cp_comercial">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="provincia_comercial" class="col-form-label">Ciudad: </label>
                            <input type="text" name="provincia_comercial" id="provincia_comercial"  class="form-control" 
                                                v-model="usuariofactura.provincia_comercial"
                                                value="usuariofactura.provincia_comercial">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pais_comercial" class="col-form-label">País : </label>
                            <input type="text" name="pais_comercial" id="pais_comercial"  class="form-control" 
                                                v-model="usuariofactura.pais_comercial"
                                                value="usuariofactura.pais_comercial">
                        </div>
                    </div>                    
                </fieldset>
                
                <fieldset>
                    <legend>Información de contacto</legend>
                    <div class="form-row">  
                        <div  class="form-group col-md-5">
                            <label for="email" class="col-form-label">Email contacto: </label>
                            <input type="email" name="email" id="email"  class="form-control" 
                                                v-model="usuariofactura.email"
                                                value="usuariofactura.email">
                        </div>
                    </div>
                    <div class="form-row">  
                        <div  class="form-group col-md-2">
                            <label for="telefono" class="col-form-label">Teléfono contacto: </label>
                            <input type="text" name="telefono" id="telefono"  class="form-control" 
                                                v-model="usuariofactura.telefono"
                                                value="usuariofactura.telefono">
                        </div>
                    </div>
                </fieldset>
<!-- 
                <fieldset>
                    <legend>Actividades</legend>
                    <!-- <p v-for="act in actividadesEmisor" :key="act.id">{{ act.id }}</p>

                    <div>
                        <button class="btn btn-success" @click.prevent="nuevaAct = !nuevaAct">
                            +
                        </button>
                        <div class="form-row" v-if="nuevaAct">  
                            <div  class="form-group col-md-5">
                                <select class="form-control-plaintext editable" id="actividad" v-model="actividad">
                                    <option disabled value="null">Seleccione una actividad</option>
                                    <option v-for="actividad in actividades" :key="actividad.id" :value="actividad.id"> {{ actividad.codigo }} - {{ actividad.titulo }} </option>
                                </select>
                                <button @click.prevent="nuevaActidad($event, actividad.id)">
                                    Añadir
                                </button>
                            </div>
    
                        </div>
                    </div>
                    
                </fieldset> -->
            </form>
        </div>

        <div class="modal-footer">
            <div style="display: inline; float: right">
                <button class="crearButton" @click="actualizar(usuariofactbd.id)">
                    Actualizar
                </button>
                <a href="/dashboard" class="cancelarButton">
                    Cancelar
                </a>
            </div>
        </div>
        

    </div>
</template>

<script>
export default {
    data(){
        return{
            usuariofactura: {
                nif: '',
                niva: '',
                nombre_fiscal: '',
                nombre_comercial: '',
                direccion_fiscal: '',
                direccion_comercial:'',
                cp_fiscal: '',
                cp_comercial:'',
                provincia_fiscal: '',
                provincia_comercial:'',
                pais_fiscal: '',
                pais_comercial:'',
                email: '',
                telefono: '',
            },
            actividades: [],
            actividadesEmisor:[], //actividades ya atadas a este emisor
            actividad: {
                id:'',
                codigo:'',
                titulo:'',
                descripcion:'',
                impuesto:''
            },

            validado: '', //recoge mensajes de errores frontend
            nuevaAct: false, //muestra select con actividades
            addAct: false,
            // contadorActs: 0,
        }
    },
    props:[
        'usuariofactbd'
    ],
    created(){
        console.log(this.usuariofactbd);
        this.usuariofactura = this.usuariofactbd;
        console.log(this.usuariofactura);
        this.getActividades();
        this.getActividadesEmisor();
    },
    mounted(){
    },
    methods:{
        //RECOGE ACTIVIDADES DEL EMISOR
        getActividadesEmisor(){
            let url = "/actividadesEmisor";
            axios.get(url, ).then(response => {
                this.actividadesEmisor = response.data;
                console.log(this.actividadesEmisor);
            }).catch((error) => {
                console.log(error);
            });
        },
        //RECOGE ACTIVIDADES DISPONIBLES
        getActividades(){
            let url = "/actividades";
            axios.get(url).then(response => {
                this.actividades = response.data;
            }).catch((error) => {
                console.log(error);
            });
        },
        //AÑADE ACTIVIDADES A EMISOR FACTURAS
        nuevaActidad(event, id){
            event.preventDefault(); 
            this.actividadesEmisor.push(id);
            // this.actividades=this.actividades.filter(actividad => actividad.id != id);
        },
        //CONTROL EMAIL
        controlEmail(email) {
            if(email){
                let emailPatron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                if(!emailPatron.test(email))
                    this.validado += "Formato email inválido\n";
            }
        },
        //RECOGE MENSAJES ERROR 422 EN SERVIDOR. Se ejecutan en caso de que el servidor devuelva un error 422
        validarServer(errors){
            let campos = ['nif', 'nombre_fiscal', 'direccion_fiscal', 'cp_fiscal', 'provincia_fiscal', 'pais_fiscal', 'telefono', 'email'];
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
        //ENVÍA A SERVIDOR PETICIÓN AJAX CON DATOS DE usuariofactbd EDITADO PARA GUARDAR EN BD
        actualizar(id){
            //Ejecuta validaciones en cliente
            this.validado=''; //blanquea
            this.controlEmail(this.usuariofactbd.email);
            if(this.validado !== ''){
                this.$notification.error(this.validado, {  timer: 4, position:'topRigth' });
                return;
            }
            //si no hubo errores, envía AJAX
            var url='/emisor/' + id;
            axios.post(url, {
                nif: this.usuariofactbd.nif,
                niva: this.usuariofactbd.niva,
                nombre_fiscal: this.usuariofactbd.nombre_fiscal,
                nombre_comercial: this.usuariofactbd.nombre_comercial,
                direccion_fiscal: this.usuariofactbd.direccion_fiscal,
                direccion_comercial: this.usuariofactbd.direccion_comercial,
                cp_fiscal: this.usuariofactbd.cp_fiscal,
                cp_comercial: this.usuariofactbd.cp_comercial,
                provincia_fiscal: this.usuariofactbd.provincia_fiscal,
                provincia_comercial: this.usuariofactbd.provincia_comercial,
                pais_fiscal: this.usuariofactbd.pais_fiscal,
                pais_comercial: this.usuariofactbd.pais_comercial,
                email: this.usuariofactbd.email,
                telefono: this.usuariofactbd.telefono,           
            }).then(response => {
                console.log(response);
                this.$notification.success("usuariofactbd actualizado correctamente!", {  timer: 4, position:'topRigth' });
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
    }
    
}
</script>
