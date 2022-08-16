<template>
  <DashboardComponent>
    <div class="content-pages">
      <h1 class="p-2">Cadastrar Usuário</h1>
      <slot>
        <div >        
        <div class="d-flex p-3">
          <form>            
            <div class="form-group">
              <label for="exampleInputEmail1">Nome</label>
              <input
                v-model="user.name"
                type="text"
                class="form-control"
                id="name"
                aria-describedby="name"
                placeholder="Nome do usuário"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input
                v-model="user.email"
                type="email"
                class="form-control"
                id="email"
                aria-describedby="email"
                placeholder="Email do usuário"
              />
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Senha</label>
              <input
                v-model="user.password"
                type="password"
                class="form-control"
                id="password"
                aria-describedby="password"
                placeholder="Senha"
              />
            </div>            
            <div class="form-check"></div>
            <div class="">
              <button
              type="submit"
              class="btn"
              @click.stop.prevent="submit"
            >
              Salvar
            </button>
            </div>
            
          </form>
        </div>
      </div> </slot>
    </div>
  </DashboardComponent>
</template>

<script>
import axios from "axios";
import DashboardComponent from "../Dashboard/DashboardComponent.vue";

export default {
  name: "RegisterUserComponent",
  data() {
    return {
      user: {
        name: '',
        email: '',
        password: '',
      } ,
    };
  },
 
 methods: { 
    submit() {

      const payload = new FormData();      
      payload.append('name', this.user.name);
      payload.append('email', this.user.email);
      payload.append('password', this.user.password);
      
      axios.post('http://localhost:8000/api/users', payload);
      this.$router.push('/users');
    },
  },
  components: {
    DashboardComponent,
  },
}; 
</script>
<style scoped>
.btn{
  color: #fff;
  background-color: red;
}
</style>
