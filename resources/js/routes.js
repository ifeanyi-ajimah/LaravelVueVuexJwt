
import About from './components/About.vue'
import Home from './components/Home.vue'
// import Myheader from './components/MyHeader.vue'
import Login from './components/auth/Login.vue'
import Dashboard from './components/Dashboard.vue'
import CustomerMain from './components/customers/Main.vue'
import CustomersList from './components/customers/List.vue'
import NewCustomer from './components/customers/New.vue'
import Customer from './components/customers/Customer.vue'
import Notfound from './components/Notfound.vue'

export const routes = [
    { path: '/', component: Home},
    {path: '/dashboard', component: Dashboard,
     meta:{
        requiresAuth: true
    }
    },
    { path: '/about', component: About },
    // { path: '/head', component: Myheader },
    {path: '/login', component: Login},
    {path: '/customers', component: CustomersList,
     meta:{
         requiresAuth: true
     },
     children: [
        {path: '/', component: CustomersList},
        {path: '/new', component: NewCustomer},
        {path: ':id', component: Customer}
     ]
    },
    {path: '*', component: Notfound}

]




