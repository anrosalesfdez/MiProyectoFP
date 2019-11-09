<template>
    <div class="row justify-content-center">
      
        <div class="col-md-12 espacios">
            <h3 style="display: inline">Configuración de usuario</h3>
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
                <legend>Información personal</legend>
                <div>
                    <label for="name" class="col-form-label">Nombre: </label>
                    <input type="text" name="name" id="name" 
                                        v-model="usuario.name"
                                        value="usuario.name">
                </div>
                <div>
                    <label for="apellido1" class="col-form-label">Apellido 1: </label>
                    <input type="text" name="apellido1" id="apellido1" 
                                        v-model="usuario.apellido1"
                                        value="usuario.apellido1">
                </div>
                <div>
                    <label for="apellido2" class="col-form-label">Apellido 2: </label>
                    <input type="text" name="apellido2" id="apellido2" 
                                        v-model="usuario.nombre"
                                        value="usuario.apellido2">
                </div>
                <div>
                    <label for="telefono" class="col-form-label">Teléfono: </label>
                    <input type="text" name="telefono" id="telefono" 
                                        v-model="usuario.telefono"
                                        value="usuario.telefono">
                </div>
                <div>
                    <label for="email" class="col-form-label">Email: </label>
                    <input type="email" name="email" id="email" 
                                        v-model="usuario.email"
                                        value="usuario.email"
                                        readonly
                                        disabled>
                </div>
                <div>
                    <label for="fechanacimiento" class="col-form-label">Fecha nacimiento: </label>
                    <input type="date" name="fechanacimiento" id="fechanacimiento" 
                                        v-model="usuario.fechanacimiento"
                                        value="usuario.fechanacimiento">
                </div>
                <div>
                    <label for="nif" class="col-form-label">NIF: </label>
                    <input type="text" name="nif" id="nif" 
                                        v-model="usuario.nif"
                                        value="usuario.nif">
                </div>
                <div>
                    <label for="direccion" class="col-form-label">Dirección: </label>
                    <input type="text" name="direccion" id="direccion" 
                                        v-model="usuario.direccion"
                                        value="usuario.direccion">
                </div>
                <div>
                    <label for="cp" class="col-form-label">Código postal: </label>
                    <input type="text" name="cp" id="cp" 
                                        v-model="usuario.cp"
                                        value="usuario.cp">
                </div>
                <div>
                    <label for="ciudad" class="col-form-label">Ciudad: </label>
                    <input type="text" name="ciudad" id="ciudad" 
                                        v-model="usuario.ciudad"
                                        value="usuario.ciudad">
                </div>
                <div>
                    <label for="pais" class="col-form-label">País: </label>
                    <input type="text" name="pais" id="pais" 
                                        v-model="usuario.pais"
                                        value="usuario.pais">
                </div>
            </fieldset>

            <fieldset>
                <legend>Cambiar contraseña</legend>
                <div>
                    <label for="passwordCurrent" class="col-form-label">Contraseña anterior: </label>
                    <input type="password" name="password" id="passwordCurrent" 
                                        v-model="usuario.passwordCurrent"
                                        value="usuario.passwordCurrent">
                </div>
                <div>
                    <label for="passwordNew" class="col-form-label">Contraseña nueva: </label>
                    <input type="password" name="passwordNew" id="passwordNew" 
                                        v-model="usuario.passwordNew"
                                        value="usuario.passwordNew">
                </div>
                <div>
                    <label for="passwordRepeat" class="col-form-label">Repita contraseña: </label>
                    <input type="password" name="passwordRepeat" id="passwordRepeat" 
                                        v-model="usuario.passwordRepeat"
                                        value="usuario.passwordRepeat">
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
            usuario: {
                name: '',
                email: '',
                passwordCurrent: '',
                passwordNew: '',
                passwordRepeat: '',
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
    controlEmail(email) {
        if(email){
            let emailPatron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(!emailPatron.test(email))
                this.validado += "Formato email inválido\n";
        }
    },
    controlPassword(e, passwordNew, passwordRepeat){
        if(passwordNew !== passwordRepeat)
            this.validado += "La contraseña nueva no coincide con la repetición\n";
    },
    //ENVÍA A SERVIDOR PETICIÓN AJAX CON DATOS DE USUARIO EDITADO PARA GUARDAR EN BD
        actualizar(id){
            //Ejecuta validaciones en cliente
            this.validado=''; //blanquea
            this.controlEmail(this.usuario.email);
            if(this.validado !== ''){
                this.$notification.error(this.validado, {  timer: 4, position:'topRigth' });
                return;
            }
            //si no hubo errores, envía AJAX
            var url='/usuario/' + id;
            axios.post(url, {
                name: this.usuario.name,
                email: this.usuario.email,
                passwordCurrent: this.usuario.passwordCurrent,
                passwordNew: this.usuario.passwordNew,
                passwordRepeat: this.usuario.passwordRepeat,
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
        },
}
</script>