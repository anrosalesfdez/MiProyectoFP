<template>
    <div class="row justify-content-center">
      
        <div class="col-md-12 espacios">
            <h3 style="display: inline">Configuración de emisor factura</h3>
            <button class="btn btn-success" @click="actualizar(id)">
                Actualizar
            </button>
            <a href="/dashboard" class="btn btn-danger">
                Cancelar
            </a>
        </div>
        
        <div class="col-md-12 espacios" >
        <form>

            <fieldset>
                <legend>Información de emisor facturas</legend>
                <div>
                    <label for="nif" class="col-form-label">NIF: </label>
                    <input type="text" name="nif" id="nif" 
                                        v-model="usuariofactura.nif"
                                        value="usuariofactura.nif">
                </div>
                <div>
                    <label for="niva" class="col-form-label">NIVA: </label>
                    <input type="text" name="apellido1" id="niva" 
                                        v-model="usuariofactura.niva"
                                        value="usuariofactura.niva">
                </div>
                <div>
                    <label for="nombrefiscal" class="col-form-label">Nombre fiscal: </label>
                    <input type="text" name="nombrefiscal" id="nombrefiscal" 
                                        v-model="usuariofactura.nombrefiscal"
                                        value="usuariofactura.nombrefiscal">
                </div>
                <div>
                    <label for="nombrecomercial" class="col-form-label">Nombre comercial: </label>
                    <input type="text" name="telefono" id="nombrecomercial" 
                                        v-model="usuariofactura.nombrecomercial"
                                        value="usuariofactura.nombrecomercial">
                </div>
                <div>
                    <label for="email" class="col-form-label">Email contacto: </label>
                    <input type="email" name="email" id="email" 
                                        v-model="usuariofactura.email"
                                        value="usuariofactura.email">
                </div>
                <div>
                    <label for="telefono" class="col-form-label">Teléfono contacto: </label>
                    <input type="text" name="telefono" id="telefono" 
                                        v-model="usuariofactura.telefono"
                                        value="usuariofactura.telefono">
                </div>
                <div>
                    <label for="direccionfiscal" class="col-form-label">Dirección fiscal: </label>
                    <input type="text" name="telefono" id="direccionfiscal" 
                                        v-model="usuariofactura.direccionfiscal"
                                        value="usuariofactura.direccionfiscal">
                </div>
                <div>
                    <label for="cp" class="col-form-label">Código postal: </label>
                    <input type="text" name="nif" id="cp" 
                                        v-model="usuariofactura.cp"
                                        value="usuariofactura.cp">
                </div>
                <div>
                    <label for="ciudad" class="col-form-label">Ciudad: </label>
                    <input type="text" name="ciudad" id="ciudad" 
                                        v-model="usuariofactura.ciudad"
                                        value="usuariofactura.ciudad">
                </div>
                <div>
                    <label for="pais" class="col-form-label">País: </label>
                    <input type="text" name="pais" id="pais" 
                                        v-model="usuariofactura.pais"
                                        value="usuariofactura.pais">
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
        console.log(this.usuariofacturabd);
    },
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
            var url='/usuariofactura/' + id;
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
</script>