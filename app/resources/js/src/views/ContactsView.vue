<template>
  <div>
    <div class="contacts_label">Cвязаться с нами</div>
    <div class="contacts_block">
      <div class="contacts">
        <div class="contacts-info">
          <p class="info_label">Контактные данные</p>
          <div v-for="item in contacts_array" :key="item" class="info-point">
            <p class="contact_name">{{ item.name }}</p>
            <p class="contact_desc">{{ item.adress }}</p>
          </div>
        </div>
        <div class="border"></div>
        <div class="pic"><img :src="'img/contacts.svg'" /></div>
      </div>
      <form action="" class="contacts_form">
        <p>Оставить заявку</p>
        <input class="input_text" type="text" placeholder="Ф.И.О" />
        <input class="input_text" type="text" placeholder="E-mail" />
        <textarea
          class="input_text"
          type="text"
          placeholder="Сообщение"
          id="msg"
        />
        <input type="submit" value="Отправить" id="send_button" />
      </form>
    </div>
    <yandex-map
      v-model="map"
      :settings="{
        location: {
          center: [37.673034, 55.874349],
          zoom: 18,
        },
      }"
      width="100%"
      height="500px"
    >
      <yandex-map-default-scheme-layer />
      <yandex-map-default-features-layer />
      <yandex-map-default-marker
        :settings="{
          coordinates: [37.673034, 55.874349],
          title: 'Староватутинский проезд, 6',
        }"
      />
    </yandex-map>
  </div>
</template>

<style scoped>
.contacts_label {
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 600;
  font-size: 28px;
  color: #000;
  margin: 24px 68px;
}

.contacts_block {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 40px;
}

.contacts {
  border-radius: 12px;
  width: 1313px;
  height: 729px;
  background: #f7f7f7;
  display: flex;
}

.contacts-info {
  width: 472px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding-left: 60px;
}

.info_label {
  font-weight: 600;
  font-family: "Zen Kaku Gothic Antique", serif;
  font-size: 24px;
  color: #000;
}

.pic {
  width: 870px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.info-point {
  margin-top: 24px;
}
.contact_name {
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 600;
  font-size: 20px;
}
.contact_desc {
  font-family: "Martian Mono", serif;
  margin-top: 4px;
  font-size: 16px;
}

.border {
  height: calc(100%-48px);
  width: 2px;
  margin: 24px;
  background-color: black;
}

.contacts_form {
  margin-top: 40px;
  display: flex;
  flex-direction: column;
  align-items: center;
  border: 4px solid #000;
  border-radius: 20px;
  width: 667px;
  height: 539px;
}
.contacts_form > p {
  font-family: "Zen Kaku Gothic Antique", serif;
  font-weight: 500;
  font-size: 24px;
  color: #000;
  margin-top: 24px;
  margin-bottom: 8px;
}

.input_text {
  margin-top: 32px;
  width: 480px;
  height: 60px;
  border-radius: 8px;
  border: 2px solid #d4452b;
  padding-left: 12px;
  font-size: 20px;
  resize: none;
}

.input_text::placeholder {
  color: rgb(0, 0, 0);
  font-family: "Zen Kaku Gothic Antique", serif;
  font-size: 20px;
  font-weight: 600;
}

.input_text:focus {
  outline: none;
}

#msg {
  min-height: 140px;
  margin-bottom: 24px;
}

#send_button {
  margin-left: 320px;
  border-radius: 12px;
  width: 180px;
  height: 40px;
  background-color: #d4452b;
  border: none;
  color: white;
  font-family: "Zen Kaku Gothic Antique", serif;
  font-size: 18px;
  font-weight: 700;
}
#send_button:active {
  width: 178px;
  height: 37px;
}
</style>

<script>
import {
  YandexMap,
  YandexMapDefaultSchemeLayer,
  YandexMapDefaultFeaturesLayer,
  YandexMapDefaultMarker,
} from "vue-yandex-maps";
export default {
  components: {
    YandexMap,
    YandexMapDefaultSchemeLayer,
    YandexMapDefaultFeaturesLayer,
    YandexMapDefaultMarker,
  },
  data: function () {
    return {
      contacts_array: [
        { name: "E-mail", adress: "is25baryats@artcollege.ru" },
        { name: "Телефон:", adress: "+7 (910) 441-48-39" },
        { name: "Telegram:", adress: "@noyaa_bezdarnost" },
        { name: "GitHub:", adress: "@Noyaa5580" },
        {
          name: "Адрес:",
          adress: "г. Москва, ул. Староватутинский пр-д, д. 6",
        },
      ],
    };
  },
};
</script>