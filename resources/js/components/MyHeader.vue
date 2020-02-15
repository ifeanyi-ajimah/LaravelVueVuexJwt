<template>
    <div class="container-fluid">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <router-link  to="/" class="nav-link" href="#">Home <span class="sr-only">(current)</span></router-link>
      </li>
      <li class="nav-item">
        <router-link to="about" class="nav-link" href="#"> About</router-link>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
     
      <template v-if="!currentUser">
        <li class="nav-item ">
        <router-link  to="login" class="nav-link " >Login</router-link>
        </li>
        <li class="nav-item ">
        <router-link  to="register" class="nav-link " >Register</router-link>
        </li>
      </template>
      <template v-else>
          <li class="nav-item">
          <router-link  to="customers" class="nav-link " >Customers</router-link>
          </li>
          <li class="nav-item dropdown">
          <a  id="navbarDropDown" class="nav-link dropdown-toggle" data-toggle="dropdown" role="buttonw" aria-expanded="false" aria-haspopup="true" >
              {{ currentUser.name }} <span class="caret"> </span>
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropDown">
             <a href="#" class="dropdown-item" @click.prevent="logout"> Logout </a>
         </div>
          </li>
      </template>

    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

    </div>
</template>

<script>
    export default {
        name: 'app-header',
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            logout(){
                this.$store.commit('logout');
                this.$router.push('/login');
            }
        },
        computed:{
            currentUser(){
                return this.$store.getters.currentUser;
            }
        }
    }
</script>
