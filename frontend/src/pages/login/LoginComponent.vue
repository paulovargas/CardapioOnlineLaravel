<template>
  <div class="main">
    <div class="login">
      <div class="content-login">
        <header>
          <h1>Login no Sistema</h1>
        </header>
        <div class="form">
          <form @submit.stop.prevent="submit">
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

export default {
  name: "LoginComponent",
  data() {
    return {
     email: '',
     password: '',
    };    
  }, 
 methods: {    
  submit() {
      const payload = {
        email: this.email,
        password: this.password
      };
      fetch(`http://localhost:8000/api/login`, {
        method: 'POST',
        headers: {
          'Content-Type':'application/json',
          'Access':'application/json',
        },
        body: JSON.stringify(payload)
      }).then(response => response.json())
      .then(res => {
        if(res !== 'Usuário inválido'){          
        localStorage.setItem('token', res)
        this.$router.push('/home')
        }
        else{
          alert(res)
        }
      }) 
    }, 
  },
};
</script>
<style lang="scss" src="./style.scss" scoped />
