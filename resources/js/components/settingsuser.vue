<template>
    <div class="row justify-content-center card">

        <div class="card-header espacios">
            <h3 style="display: inline">Configuración de usuario</h3>
            <div style="display: inline; float: right">
                <button class="btn btn-success" @click="actualizar(usuario.id)">
                    Actualizar
                </button>
                <a href="/dashboard" class="btn btn-danger">
                    Cancelar
                </a>
            </div>
        </div>
     
        <div class="card-body espacios" >
        <form>
            <fieldset>
                <legend>Información personal</legend>
                <div class="form-row">  
                    <div class="form-group col-md-4"> 
                        <label for="name" class="col-form-label">Nombre: </label>
                        <input type="text" name="name" id="name" class="form-control" 
                                            v-model="usuario.name"
                                            value="usuario.name">
                    </div>
                    <div class="form-group col-md-4"> 
                        <label for="apellido1" class="col-form-label">Apellido 1: </label>
                        <input type="text" name="apellido1" id="apellido1" class="form-control" 
                                            v-model="usuario.apellido1"
                                            value="usuario.apellido1">
                    </div>
                    <div class="form-group col-md-4"> 
                        <label for="apellido2" class="col-form-label">Apellido 2: </label>
                        <input type="text" name="apellido2" id="apellido2" class="form-control" 
                                            v-model="usuario.nombre"
                                            value="usuario.apellido2">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2"> 
                        <label for="telefono" class="col-form-label">Teléfono: </label>
                        <input type="text" name="telefono" id="telefono" class="form-control" 
                                            v-model="usuario.telefono"
                                            value="usuario.telefono">
                    </div>
                    <div class="form-group col-md-7"> 
                        <label for="email" class="col-form-label">Email: </label>
                        <input type="email" name="email" id="email" class="form-control" 
                                            v-model="usuario.email"
                                            value="usuario.email"
                                            readonly
                                            disabled
                                            autocomplete="off">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="fechanacimiento" class="col-form-label">Fecha nacimiento: </label>
                        <input type="date" name="fechanacimiento" id="fechanacimiento" class="form-control" 
                                            v-model="usuario.fechanacimiento"
                                            value="usuario.fechanacimiento">
                    </div>
                </div>
                <div class="form-row">  
                    <div class="form-group col-md-2">
                        <label for="nif" class="col-form-label">NIF: </label>
                        <input type="text" name="nif" id="nif" class="form-control" 
                                            v-model="usuario.nif"
                                            value="usuario.nif">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="direccion" class="col-form-label">Dirección: </label>
                        <input type="text" name="direccion" id="direccion" class="form-control" 
                                            v-model="usuario.direccion"
                                            value="usuario.direccion">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cp" class="col-form-label">Código postal: </label>
                        <input type="text" name="cp" id="cp" class="form-control" 
                                            v-model="usuario.cp"
                                            value="usuario.cp">
                    </div>
                </div>
                <div class="form-row">  
                    <div class="form-group col-md-4">
                        <label for="ciudad" class="col-form-label">Ciudad: </label>
                        <input type="text" name="ciudad" id="ciudad" class="form-control" 
                                            v-model="usuario.ciudad"
                                            value="usuario.ciudad">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="pais" class="col-form-label">País: </label>
                        <input type="text" name="pais" id="pais" class="form-control" 
                                            v-model="usuario.pais"
                                            value="usuario.pais">
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Cambiar contraseña</legend>
                <div class="form-group col-md-3">
                    <label for="passwordCurrent" class="col-form-label">Contraseña anterior: </label>
                    <input type="password" name="passwordCurrent" id="passwordCurrent" class="form-control" 
                                        v-model="usuario.passwordCurrent"
                                        value="usuario.passwordCurrent"
                                        autocomplete="new-password">
                </div>
                <div class="form-group col-md-3">
                    <label for="passwordNew" class="col-form-label">Contraseña nueva: </label>
                    <input type="password" name="passwordNew" id="passwordNew" class="form-control" 
                                        v-model="usuario.passwordNew"
                                        value="usuario.passwordNew"
                                        autocomplete="new-password">
                </div>
                <div class="form-group col-md-3">
                    <label for="passwordNew_confirmation" class="col-form-label">Repita contraseña: </label>
                    <input type="password" name="passwordNew_confirmation" id="passwordNew_confirmation" class="form-control" 
                                        v-model="usuario.passwordNew_confirmation"
                                        value="usuario.passwordNew_confirmation"
                                        autocomplete="new-password">
                </div>
            </fieldset>
        
        </form>
        </div>

        <div class="modal-footer">
            <button class="btn btn-success" @click="actualizar(usuario.id)">
                Actualizar
            </button>
            <a href="/dashboard" class="btn btn-danger">
                Cancelar
            </a>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            usuario: {
                id:'',
                name: '',
                email: '',
                passwordCurrent: '',
                passwordNew: '',
                passwordNew_confirmation: '',
                apellido1: '',
                apellido2: '',
                telefono: '',
                fechanacimiento: '',
                nif: '',
                direccion: '',
                cp: '',
                ciudad: '',
                pais: ''
            },
            validado: '', //recoge mensajes de errores front end y back end en caso de haberlos.
        }
    },
    props:[
        'usuariobd'
    ],
    created(){
        this.usuario = this.usuariobd;
        console.log(this.usuario);
        console.log(this.usuariobd);
    },
    methods:{
        //COMPRUEBA QUE LA NUEVA CONTRASEÑA CUMPLE PATRÓN: MIN 8 + caracter especial + número
        controlPassword0(passwordNew){
            var regularExpression = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;
            // var regularExpression = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
            if(!regularExpression.test(passwordNew))
                this.validado += "La contraseña no cumple patrón\n";
        },
        //COMPRUEBA QUE NUEVA Y CONFIRMACIÓN, COINCIDAN
        controlPassword1(passwordNew, passwordNew_confirmation){
            if(passwordNew !== passwordNew_confirmation)
                this.validado += "La contraseña nueva no coincide con la repetición\n";
        },
        //VALIDA EN SERVIDOR. Se ejecutan en caso de que el servidor devuelva un error 422
        validarServer(errors){
            let campos = ['passwordCurrent', 'passwordNew'];
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
        //ENVÍA A SERVIDOR PETICIÓN AJAX CON DATOS DE USUARIO EDITADO PARA GUARDAR EN BD
        actualizar(id){
            //Ejecuta validaciones en cliente
            this.validado=''; //blanquea
            if(typeof this.usuario.passwordCurrent !== 'undefined'){
                console.log(this.usuario.passwordCurrent);
                this.controlPassword0(this.passwordNew);
                this.controlPassword1(this.usuario.passwordNew, this.usuario.passwordNew_confirmation);
            }
            //Si errores, muestra notificación conjunta
            if(this.validado !== ''){
                this.$notification.error(this.validado, {  timer: 4, position:'topRigth' });
                return;
            }
            //si no hubo errores, envía AJAX
            var url='/settingsuser/' + id;
            axios.post(url, {
                id: this.usuario.id,
                name: this.usuario.name,
                email: this.usuario.email,
                passwordCurrent: this.usuario.passwordCurrent,
                passwordNew: this.usuario.passwordNew,
                passwordNew_confirmation: this.usuario.passwordNew_confirmation,
                apellido1: this.usuario.apellido1,
                apellido2: this.usuario.apellido2,
                telefono: this.usuario.telefono,
                fechanacimiento: this.usuario.fechanacimiento,
                nif: this.usuario.nif,
                direccion: this.usuario.direccion,
                cp: this.usuario.cp,
                ciudad: this.usuario.ciudad,
                pais: this.usuario.pais
            }).then(response => {
                console.log(response);
                this.$notification.success("Usuario actualizado correctamente!", {  timer: 4, position:'topRigth' });
            }).catch((error) => {
                if(error.response.status == 422){
                    let validadoServer = this.validarServer(error.response.data.errors);
                    if(validadoServer!=='')
                        this.$notification.error(validadoServer, {  timer: 4, position:'topRigth' });
                }else{
                    this.$notification.error(error.response.data.errors, {  timer: 4, position:'topRigth' });
                }
                
            });
        }
    }
    
}
</script>
<style>
.espacios {
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>