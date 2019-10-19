<template>
<div class="row" id="cliente_nuevo">

    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 style="display: inline">Visualización cliente: <strong>{{ this.clMostrar.razon_social }}</strong></h3>
                <div style="display: inline; float: right">
                    <a v-bind:href="'/clientes/editar/'+this.clMostrar.id" class="btn btn-primary">Permitir edición</a>
                    <a href="/clientes/listar" class="btn btn-danger">Cancelar</a>
                </div>
            </div>
            <div class="card-body">
                <!--formulario visualización cliente-->
                <form>

                    <div class="form-row">
                        <div class="form-group col-md-1">
                            <label for="id" class="col-form-label">ID cliente</label>      
                            <input type="text" class="form-control" readonly name="id" id="id" v-model="clMostrar.id">
                        </div>
                        <div class="form-group col-md-11">
                            <label for="razon_social" class="col-form-label">Razón social</label>      
                        <input type="text" class="form-control" disabled name="razon_social" id="razon_social" v-model="clMostrar.razon_social" v-touppercase>
                        </div>
                    </div>

                    <div class="form-group">
                        
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nif" class="col-form-label">NIF</label>      
                            <input type="text" class="form-control" disabled nif="nif" id="nif" v-model="clMostrar.nif" v-touppercase> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="niva" class="col-form-label">NIVA</label>      
                            <input type="text" class="form-control" disabled name="niva" id="niva" v-model="clMostrar.niva" v-touppercase>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion" class="col-form-label">Dirección</label>      
                        <input type="text" class="form-control" disabled name="direccion" id="direccion" v-model="clMostrar.direccion" v-touppercase>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="provincia" class="col-form-label">Provincia</label>      
                            <input type="text" class="form-control" disabled name="provincia" id="provincia" v-model="clMostrar.provincia" v-touppercase>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="pais" class="col-form-label">Pais</label>      
                            <input type="text" class="form-control" disabled name="pais" id="pais" v-model="clMostrar.pais" v-touppercase>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cp" class="col-form-label">Código Postal</label>      
                            <input type="text" class="form-control" disabled name="cp" id="cp" v-model="clMostrar.cp" v-touppercase>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="tlfn" class="col-form-label">Teléfono</label>      
                            <input type="tel" class="form-control" disabled name="tlfn" id="tlfn" v-model="clMostrar.tlfn"> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label">Email</label>      
                            <input type="email" class="form-control" disabled name="email" id="email" v-model="clMostrar.email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ambito_cl" class="col-form-label">Ámbito cliente</label>
                            <select class="form-control" name="ambito_cl" id="ambito_cl" disabled v-model="clMostrar.ambito_cl">
                                <option disabled selected value="">Ámbito de cliente...</option>
                                <option value="NACIONAL">NACIONAL</option>
                                <option value="INTRACOMUNITARIO">INTRACOMUNITARIO</option>
                                <option value="EXTRACOMUNITARIO">EXTRACOMUNITARIO</option>
                            </select>         
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_cl" class="col-form-label">Tipo cliente</label>
                            <select class="form-control" name="tipo_cl" id="tipo_cl" disabled v-model="clMostrar.tipo_cl">
                                <option disabled selected value="">Tipo de cliente...</option>
                                <option value="PERSONA FISICA">PERSONA FISICA</option>
                                <option value="PERSONA JURIDICA">PERSONA JURIDICA</option>
                            </select>        
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="forma_pago" class="col-form-label">Método de pago</label>
                            <select class="form-control" disabled name="forma_pago" id="forma_pago" v-model="clMostrar.forma_pago">
                                <option disabled selected value="">Elije método...</option>
                                <option value="TRANSFERENCIA">TRANSFERENCIA</option>
                                <option value="PAY PAL">PAY PAL</option>
                                <option value="CONTADO">CONTADO</option>
                            </select>      
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dias_pago" class="col-form-label">Plazo para el pago</label>
                            <select class="form-control" disabled name="dias_pago" id="dias_pago" v-model="clMostrar.dias_pago">
                                <option disabled selected value="">Elige días...</option>
                                <option value="0">0</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                                <option value="60">60</option>
                            </select>        
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="observ" class="col-form-label">Observaciones</label>
                        <textarea class="form-control" disabled name="observ" id="observ"></textarea>
                    </div>

                    <div class="modal-footer">
                        <a v-bind:href="'/clientes/editar/'+this.clMostrar.id" class="btn btn-primary">Permitir edición</a>
                        <a href="/clientes/listar" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</template> 


<script>

export default{
    data(){ //datos del componente
        return {
            clMostrar: this.cliente, //se le asigna el valor que nos da blade
        }
    },
    props:[
        'cliente', //prop que envía clientes_editar.blade
    ],
    created() {
        console.log(this.clMostrar);
    }
}
</script>