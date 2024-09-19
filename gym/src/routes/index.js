import * as VueRouter from 'vue-router'
//import RegisterComponent from '@/views/auth/RegisterComponent.vue'
//import VerifyComponent from '@/views/auth/VerifyComponent.vue'
import LoginComponent from '@/views/auth/LoginComponent.vue'

const adminRoutes = [
    //{path:'home', component:() => import('@/views/admin/home/AdminHomeComponent.vue')},
    //{path:'users', component:() => import('@/views/admin/users/AdminUsersComponent.vue')},
    //{path:'products', component:() => import('@/views/admin/products/AdminProductsComponent.vue')},
    //{path:'products/add', component:() => import('@/views/admin/products/AdminProductAddComponent.vue')},
]


const routes=[
    //{path:'/', component:() => import('@/views/admin/home/AdminHomeComponent.vue')},
    //{path:'/auth/register', name:'register', component: RegisterComponent},
    //{path:'/shopping', name:'shopping', component:() => import('@/views/front/ShoppingCardComponent.vue')},
    //{path:'/auth/verify', name:'verify', component: VerifyComponent},
    {path:'/auth/login', name:'login', component: LoginComponent},
    //{path:'/products/:id', component:() => import('@/views/admin/carrito/VistaProductos.vue')},
    //{path:'/checkout/', name:'checkout', component:() => import('@/views/admin/layouts/CheckoutComponent.vue')},
    //{path:'/pedido/:id', name:'ver_pedido', component:()=>import('@/views/front/pedidos/VerPedidoComponent.vue')},


    {path:'/admin', name: 'admin-home',
    component: import ('@/views/admin/layouts/AdminLayoutComponent.vue'),
    children: adminRoutes
     },
]


const router = VueRouter.createRouter({
    history:VueRouter.createWebHistory(),
    routes
});
export default router