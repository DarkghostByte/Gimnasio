import axios from "axios";

const API_URL = process.env.VUE_APP_ROOT_API

class AuthService{
    login(user){
        return axios.post(API_URL+'login',{
            email:user.email,
            password:user.password
        }).then(response=>{
            if(response.data.token){
                localStorage.setItem("onlyfans_tkn",JSON.stringify(response.data))
            }
            return response.data
        }).catch(error=>{
            console.log("ERROR DE LOGIN",error)
        })
    }
    logout(){
        localStorage.removeItem('onlyfans_tkn')
    }
}
export default new AuthService()