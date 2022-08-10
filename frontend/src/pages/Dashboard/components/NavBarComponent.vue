<template>
  <div class="navbar">
    <img src="../../../assets/logo_branco.png" />
    <a href="" @click.prevent="logout" class="logout"
      >Sair <i class="fa fa-sign-out-alt"></i
    ></a>
  </div>
</template>

<script>
export default {
  name: "SideBarComponent",
  methods: {
    logout() {
      this.$router.push({ name: "login" });
    },
  },
};
</script>

<style lang="scss">
.navbar {
  .logout {
    text-decoration: none;
    justify-content: end;
    color: #fff;
  }
}
</style>
