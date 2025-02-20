<template>
  <div class="container" id="con">
    <transition
      name="fade-move"
      @before-enter="beforeEnter"
      :css="false"
      @enter="enter"
      @before-leave="beforeLeave"
      @leave="leave"
      ><form
        class="form_reg"
        @submit.prevent="this.register()"
        v-if="this.HaveAccount == false"
      >
        <div :class="['form_name', 'centered']"><p>Регистрация</p></div>
        <div class="mb-3">
          <label for="name" class="form-label">Имя</label>
          <input
            type="text"
            class="form-control"
            id="name"
            v-model="this.RegFormData.name"
          />
        </div>
        <div class="mb-3">
          <label for="patronymic" class="form-label">Отчество</label>
          <input
            type="text"
            class="form-control"
            id="patronymic"
            v-model="this.RegFormData.patronymic"
          />
        </div>
        <div class="mb-3">
          <label for="surname" class="form-label">Фамилия</label>
          <input
            type="text"
            class="form-control"
            id="surname"
            v-model="this.RegFormData.surname"
          />
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Телефон</label>
          <input
            type="text"
            class="form-control"
            id="phone"
            v-model="this.RegFormData.phone"
          />
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Почта</label>
          <input
            type="email"
            class="form-control"
            id="email"
            v-model="this.RegFormData.email"
          />
        </div>
        <div class="mb-3">
          <label for="login" class="form-label">Логин</label>
          <input
            type="text"
            class="form-control"
            id="login"
            v-model="this.RegFormData.login"
          />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input
            type="password"
            class="form-control"
            id="password"
            v-model="this.RegFormData.password"
          />
        </div>
        <div class="centered">
          <button type="submit" class="btn btn-success">
            Зарегестрироваться
          </button>
          <div class="have_acc" @click="this.account_state()">
            Уже есть аккаунт? Войти
          </div>
        </div>
      </form>
    </transition>

    <transition
      name="fade-move"
      @before-enter="beforeEnter"
      :css="false"
      @enter="enter"
      @before-leave="beforeLeave"
      @leave="leave"
    >
      <form class="form" @submit.prevent="this.auth()" v-if="this.HaveAccount">
        <div :class="['form_name', 'centered']"><p>Авторизация</p></div>
        <div class="mb-3">
          <label for="login" class="form-label">Логин</label>
          <input
            type="text"
            class="form-control"
            id="login"
            v-model="this.AuthFormData.login"
          />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Пароль</label>
          <input
            type="password"
            class="form-control"
            id="password"
            v-model="this.AuthFormData.password"
          />
        </div>
        <div class="centered">
          <button type="submit" class="btn btn-success">Войти</button>
          <div class="have_acc" @click="this.account_state()">
            Создать аккаунт
          </div>
        </div>
      </form></transition
    >
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      RegFormData: {
        name: "",
        patronymic: "",
        surname: "",
        phone: "",
        email: "",
        login: "",
        password: "",
        role: 1,
      },
      AuthFormData: {
        login: "",
        password: "",
      },
      HaveAccount: false,
    };
  },
  methods: {
    beforeEnter(el) {
      // Устанавливаем начальное состояние для анимации появления
      el.style.opacity = 0;
      el.style.transform = "translateX(100px)";
      // el.style.height = el.offsetHeight + "px";
    },
    enter(el, done) {
      // Запуск анимации появления
      el.offsetHeight; // trigger reflow to restart the animation
      el.style.transition =
        "opacity 0.5s ease, transform 0.5s ease, height 0.5s ease";
      el.style.opacity = 1;
      el.style.height = el.offsetHeight + "px";
      el.style.transform = "translateX(0)";
      done(); // Завершаем анимацию
      this.$router.push("#con");
    },
    beforeLeave(el) {
      // Подготовка элемента к исчезновению
      el.style.transition =
        "opacity 0.5s ease, transform 0.5s ease, height 0.5s ease ";
    },
    leave(el, done) {
      // Анимация исчезновения
      el.style.margin = 0;
      el.style.opacity = 0;
      el.style.height = 0 + "px";
      el.style.transform = "translateX(100px)";
      // Задерживаем удаление элемента до завершения анимации
      setTimeout(done, 500); // Время задержки должно совпасть с длительностью анимации
    },
    account_state() {
      switch (this.HaveAccount) {
        case false:
          this.HaveAccount = true;
          break;
        case true:
          this.HaveAccount = false;
          break;
      }
    },

    async register() {
      try {
        const response = await axios.post("/register", this.RegFormData);
        if (response.status == 200) {
          //   toast.success(response.status + ' Объект добавлен', {timeout: 2000})
          console.log("success");
          this.$router.push({ path: "/" });
        }
        console.log(error);
      } catch (error) {}
    },
    async auth() {
      try {
        const response = await axios.post("/auth", this.AuthFormData);
        if (response.status == 200) {
          //   toast.success(response.status + ' Объект добавлен', {timeout: 2000})
          console.log("auth good");
          this.$router.push({ path: "/" });
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
};
</script>

<style scoped>
.container {
  width: 1000px;
}
form {
  padding: 24px;
  border-radius: 24px;
  border: 2px solid #d4452b;
}
input {
  border: 1px solid #d4452b;
}
input:focus {
  outline: none;
}
.form-control:focus {
  outline: none; /* Убираем обводку */
  box-shadow: 0px 0px 10px 0.3px var(--bs-primary); /* Убираем тень */
}
.centered {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
.form_name {
  font-family: "Zen Kaku Gothic Antique", serif;
  font-size: 36px;
  font-weight: 600;
}
.have_acc {
  background: none;
  border: none;
  color: rgb(56, 56, 245);
  margin-top: 6px;
  text-decoration: underline;
  cursor: pointer;
}
@media (min-width: 320px) and (max-width: 767px) {
  .container {
    width: 300px;
  }
  .form_name {
    font-size: 24px;
  }
  .have_acc {
    text-align: center;
  }
}
@media (min-width: 768px) and (max-width: 1023px) {
}
@media (min-width: 1024px) and (max-width: 1440px) {
}
</style>