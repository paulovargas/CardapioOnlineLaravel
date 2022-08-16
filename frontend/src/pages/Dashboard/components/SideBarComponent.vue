<template>
  <div class="sidebar">
    <div class="top">
      <div class="avatar">
        <span><i class="fa fa-user"></i></span>
      </div>
      <div class="info">
        <p class="name">Nome User</p>
        <p class="status">Online</p>
      </div>
    </div>
    <div class="menu">
      <ul>
        <li>
          <router-link :to="{ name: 'home' }"
            ><i class="fa fa-home"></i> Início</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'menu' }"
            ><i class="fa-solid fa-bowl-food"></i> Cardápio</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'registerMenu' }"
            ><i class="fa fa-edit"></i> Cadastrar Cardápio</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'registerCategory' }"
            ><i class="fa fa-list"></i> Categorias</router-link
          >
        </li>
        <li>
          <router-link :to="{ name: 'users' }"
            ><i class="fa fa-users"></i> Usuários</router-link
          >
        </li>
        
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "SideBarComponent",
};
</script>

<style lang="scss">
.sidebar {
  .top {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 25px 5px;
    margin-top: 25px;

    .avatar {
      margin-right: 10px;
      span {
        display: block;
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background-color: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
      }
    }
    .info {
      p {
        margin: 0;
        color: #fff;
      }
      .name {
        font-size: 13px;
      }

      .status {
        margin: 0;
        font-size: 10px;
      }
    }
  }
  .menu {
    margin-top: 15px;
    padding: 10px 20px;

    ul li {
      margin: 15px 0;
      font-size: 18px;
      list-style: none;

      a {
        color: #fff;
        text-decoration: none;
      }
    }
  }
}
</style>
