<template>
  <div class="main">
    <div class="login">
      <div class="content-login">
        <header>
          <h1>Login no Sistema</h1>
        </header>
        <div class="form">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input
                v-model="email"
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Email"
              />
            </div>
            <div class="form-group mt-3">
              <label for="exampleInputPassword1">Senha</label>
              <input
                v-model="password"
                type="password"
                class="form-control"
                id="exampleInputPassword1"
                placeholder="Senha"
              />
            </div>
            <div class="form-check"></div>
            <button
              type="submit"
              class="btn btn-primary"
              @click="submit"
            >
              Entrar
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>

import api from "../../api";

export default {
  name: "LoginComponent",
  data() {
    return {
    token: {}
    };
    
  }, 
 methods: {    
    submit() {
      var data = {email:this.email, password:this.password}
      console.log(data)

      api
      .post("/login", data)
      .then((res) => {
        this.menus = res.data;
        console.log('menus',this.menus)
      })
      .catch((error) => {
        console.log(error)
      });
      /* api.post('/login', data).then((response)=>{
      console.log(response)
      localStorage.setItem('token', response.data.access_token)

      })
      .catch((error)=>{
        console.log('Erro', error.response)
      }) */





/* 
      .post("/login", data)
      .then((res) => {
        this.token = res.data.access_token;
        console.log('menus',this.token)
      })
      .catch((error) => {
        console.log(error)
      }); */
    },
  },
};

/* methods: {
    async submit(){
      var data = {email:this.email, password:this.password}
      console.log(data)

      const response = await axios.post(
        "http://localhost:8000/api/login",
         { data }
      );
      console.log('response :', response)

      /* this.$http.post('login', data).then(response => {
        console.log(response)
      })
      .catch((error)=>{
        console.log(error.response)
      }) */

      /* this.$http.post('login', data).then((response)=>{
        console.log(response)
        localStorage.setItem('token', response.data.access_token)

      })
      .catch((error)=>{
        console.log('Erro', error.response)
      })

    }
  },*/
</script>
<style lang="scss" src="./style.scss" scoped />
