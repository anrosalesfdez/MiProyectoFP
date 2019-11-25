<template>
    <div class="row justify-content-center card">
      
        <div class="card-header">
            <h3 style="display: inline">Configuración de emisor facturas</h3>
            <div style="display: inline; float: right">
                <button class="btn btn-success" @click="actualizar(usuariofactura.id)">
                    Actualizar
                </button>
                <a href="/dashboard" class="btn btn-danger">
                    Cancelar
                </a>
            </div>
        </div>
        
        <div class="card-body espacios">
            <form>
                <fieldset>
                    <legend>Información de facturación</legend>
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
                            <label for="nombrefiscal" class="col-form-label">Nombre fiscal: </label>
                            <input type="text" name="nombrefiscal" id="nombrefiscal"  class="form-control" 
                                                v-model="usuariofactura.nombrefiscal"
                                                value="usuariofactura.nombrefiscal">
                        </div>
                        <div  class="form-group col-md-6">
                            <label for="nombrecomercial" class="col-form-label">Nombre comercial: </label>
                            <input type="text" name="telefono" id="nombrecomercial"  class="form-control" 
                                                v-model="usuariofactura.nombrecomercial"
                                                value="usuariofactura.nombrecomercial">
                        </div>
                    </div>
                    <div class="form-row">  
                        <div class="form-group col-md-6">
                            <label for="direccionfiscal" class="col-form-label">Dirección fiscal: </label>
                            <input type="text" name="telefono" id="direccionfiscal"  class="form-control" 
                                                v-model="usuariofactura.direccionfiscal"
                                                value="usuariofactura.direccionfiscal">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cp" class="col-form-label">Código postal: </label>
                            <input type="text" name="nif" id="cp"  class="form-control" 
                                                v-model="usuariofactura.cp"
                                                value="usuariofactura.cp">
                        </div>
                    </div>
                    <div class="form-row">  
                        <div class="form-group col-md-3">
                            <label for="ciudad" class="col-form-label">Ciudad: </label>
                            <input type="text" name="ciudad" id="ciudad"  class="form-control" 
                                                v-model="usuariofactura.ciudad"
                                                value="usuariofactura.ciudad">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="pais" class="col-form-label">País: </label>
                            <input type="text" name="pais" id="pais"  class="form-control" 
                                                v-model="usuariofactura.pais"
                                                value="usuariofactura.pais">
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
                        <div  class="form-group col-md-2">
                            <label for="telefono" class="col-form-label">Teléfono contacto: </label>
                            <input type="text" name="telefono" id="telefono"  class="form-control" 
                                                v-model="usuariofactura.telefono"
                                                value="usuariofactura.telefono">
                        </div>
                    </div>
                </fieldset>
            </form>
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
                nombrefiscal: '',
                nombrecomercial: '',
                email: '',
                telefono: '',
                direccionfiscal: '',
                cp: '',
                ciudad: '',
                pais: ''
            },
            validado: '', //recoge mensajes de errores front end y back end en caso de haberlos.
        }
    },
    props:[
        'usuariofactbd'
    ],
    created(){
        this.usuariofactura = this.usuariofactbd;
        console.log(this.usuariofactura);
        console.log(this.usuariofactbd);
    },
    methods:{
        controlEmail(email) {
        if(email){
            let emailPatron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(!emailPatron.test(email))
                this.validado += "Formato email inválido\n";
        }
    },
    //ENVÍA A SERVIDOR PETICIÓN AJAX CON DATOS DE usuariofactura EDITADO PARA GUARDAR EN BD
        actualizar(id){
            //Ejecuta validaciones en cliente
            this.validado=''; //blanquea
            this.controlEmail(this.usuariofactura.email);
            if(this.validado !== ''){
                this.$notification.error(this.validado, {  timer: 4, position:'topRigth' });
                return;
            }
            //si no hubo errores, envía AJAX
            var url='/settingsfact/' + id;
            axios.post(url, {
                nif: this.usuariofactura.nif,
                niva: this.usuariofactura.niva,
                nombrefiscal: this.usuariofactura.nombrefiscal,
                nombrecomercial: this.usuariofactura.nombrecomercial,
                email: this.usuariofactura.email,
                telefono: this.usuariofactura.telefono,
                direccionfiscal: this.usuariofactura.direccionfiscal,
                cp: this.usuariofactura.cp,
                ciudad: this.usuariofactura.ciudad,
                pais: this.usuariofactura.pais
            }).then(response => {
                console.log(response);
                this.$notification.success("usuariofactura actualizado correctamente!", {  timer: 4, position:'topRigth' });
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

<style>
.espacios {
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>