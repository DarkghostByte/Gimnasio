<template>
    <div>
        <div class="flex justify-center items-center h-screen" style="background-color: #0D1716;">
            <div class="flex" style="width:60%; height: 70%;">
                <div class="contenedor1 flex justify-center items-center">
                    <img v-bind:src="url + 'img/logoGym.png'" class="img"/>
                </div>
                <div class="contenedor2 flex justify-center">
                    <div>
                        <h1 class="text-center text-7xl font-bold py-8 text-[#C2C2C2]">GYM</h1>
                        <h1 class="text-center text-2xl font-bold text-[#C2C2C2]">Inicia Sesion En Nuestro Panel De Administracion</h1>
                        <div class="flex justify-center">
                            <el-form :label-position="'top'" style="width: 80%;" :model='form1' :rules="rules" ref="formRef">
                                <el-form-item label="Correo:" prop="email">
                                    <el-input v-model="form1.email" placeholder="Ingresar correo:" :style="{ fontSize: '18px', color: '#0D1716'}"/>
                                </el-form-item>
            
                                <el-form-item label="Contraseña" prop="password" class="lblForm">
                                    <el-input v-model="form1.password" type="password" placeholder="Ingresar contraseña:" :style="{ fontSize: '18px', color: '#0D1716' }"/>
                                </el-form-item>
                                <div class="flex justify-center items-center">
                                    <el-form-item>
                                        <el-button size="large" :style="{ fontSize: '18px', borderRadius: '15px' }" @click="submitForm(formRef)">Iniciar</el-button>
                                    </el-form-item>
                                </div>
                                
                            </el-form>
                        </div>
                    </div>
                </div>
                <!--
                <el-form :label-position="'top'" style="max-width: 600px;" :model='form1' :rules="rules" ref="formRef">
                    <el-form-item label="Email" prop="email">
                        <el-input v-model="form1.email" />
                    </el-form-item>

                    <el-form-item label="Password" prop="password">
                        <el-input v-model="form1.password" type="password" />

                    </el-form-item>
                    <el-form-item>
                        <el-button type="success" @click="submitForm(formRef)">Aceptar</el-button>
                    </el-form-item>

                </el-form>
                -->
            </div>

        </div>
        <!--MODAL-->
        <el-dialog v-model="dialogVisible" title="TERMINOS Y CONDICIONES DE CARFACT" width="500">
            <template #footer>
                <div class="dialog-footer">
                    <el-button @click="dialogVisible = false">Cancel</el-button>
                    <el-button type="primary" @click="dialogVisible = false">
                        Confirm
                    </el-button>
                </div>
            </template>
        </el-dialog>
    </div>
</template>
<script>
import { ElNotification } from 'element-plus';
import { reactive } from 'vue'
import { mapState, mapActions } from 'vuex';
export default {
    name: 'LoginComponent',
    computed: {
        loggedIn() {
            return this.$store.state.auth.status.loggedIn
        },
        currentUser() {
            return this.$store.state.auth.user
        },
        ...mapState('auth', ['loggedIn', 'user']),
    },
    data: () => ({
        dialogVisible: false,
        formRef: undefined,
        url: process.env.VUE_APP_ROOT_ASSETS,
        form1: reactive({
            password: '',
            email: '',

        }),
        rules: {
            password: [
                { required: true, message: 'La contraseña es requerida', trigger: 'blur' },
                { min: 3, max: 100, message: 'Longitud deveria ser 3 a 10', trigger: 'blur' }
            ],
            email: [
                { required: true, message: 'El Email es requerido', trigger: 'blur' },
            ],
        }
    }),
    methods: {
        ...mapActions('auth.module', ['login', 'logout']),
        submitForm() {
            this.$refs.formRef.validate((valid, fields) => {

                if (valid) {
                    console.log(fields);
                    this.$store.dispatch("auth/login", {
  email: this.form1.email,
  password: this.form1.password
}).then(
                        user => { 
                            console.log(user)
                            if(!user){
                                ElNotification({title:'Error', message:'Credenciales incorrectas',type: 'error'
                            })
                            }else{

                                ElNotification({title:'Success',message:'Login Correcto', type: 'success',
                            });
                            this.$router.push('/admin/home');
                            }
                        },
                        error => {
                            console.log(error)
                            ElNotification({
                                title: 'Error',
                                message: 'Credenciales incorrectas',
                                type: 'error'
                            })
                        }
                    )
                } else {
                    ElNotification({
                        title: 'Error',
                        message: 'Favor de llenar los campos',
                        type: 'error'
                    })
                }
            })
        }
    }

}
</script>
<style>
    .contenedor1{
        background-color: #737373; 
        width:45%; 
        height: 100%;
        border-radius: 25px 0% 0% 25px;
    }
    .contenedor2{
        background-color: #2B2B2B; 
        width:55%; 
        height: 100%;
        border-radius: 0% 25px 25px 0%;
    }
    .img{
        margin: 0 auto;
        width: 100%;
        height: 100%;
    }
    .el-form-item__label {
        font-size: 18px;
        color:#C2C2C2;
        /*borderRadius: '15% 0px 15% 0px'*/
    }
    .el-form-item .el-button {
        background-color: #737373; /* Base color for the button */
        color: #0D1716; /* Base color for text */
        border-color: #2B2B2B; /* Base color for border */
        border-radius: 15px; /* Consistent border radius */
        transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
      }
      
      .el-form-item .el-button:hover {
        background-color: #0D1716; /* Inverted background color on hover */
        color: #ffffff; /* Inverted text color on hover */
        border-color: #737373; /* Inverted border color on hover */
      }

</style>