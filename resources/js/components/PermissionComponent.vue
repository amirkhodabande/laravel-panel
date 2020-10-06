<template>
    <div>

<!-- Deleting permissions -->
        <section class="panel">
            <header class="panel-heading">حذف مجوز های کاربر</header>
        </section>
        <div class="users-containter">
                <section v-for="per in userPermissions" :key="userPermissions.indexOf(per)"
                     class="users-p">
                    <button @click="hello"><i class="icon-remove"></i></button>
                    <p>{{ per.name }}</p>
                </section>
        </div>
<!-- End -->
<br><br>
<!-- Adding permissions -->
        <section class="panel">
            <header class="panel-heading">اضافه کردن مجوز به کاربر</header>
        </section>
        <div class="users-containter">

                <section class="users-p p-store">
                    <button @click="hello"><i class="icon-hand-up"></i></button>
                    <p>Amir hossein</p>
                </section>

        </div>
<!-- End -->

    </div>
</template>

<script>
import axios from "axios";
export default {
      props: ["user_permissions"],
      data() {
            return {
                  userPermissions: JSON.parse(this.user_permissions),
            };
      },

      methods: {
            hello() {
                  axios.post(`/admin/permissions`, this.lesson)
                        .then((resp) => {
                              console.log(resp);
                        })
                        .catch((error) => {
                              console.log(error);
                        });
            },
      },
};
</script>

<style scoped>
.users-containter {
      display: flex;
      justify-content: start;
}

.users-p {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 90px;
      width: 190px;
      border-radius: 10px;
      background-image: linear-gradient(
            140deg,
            rgb(161, 230, 255) 45%,
            rgb(255, 191, 191) 65%
      );
      margin: 0 10px;
      box-shadow: 0px 0px 5px rgb(97, 141, 158);
      color: white;
      font-size: 18px;
      position: relative;

      transition-property: all;
      transition-duration: 400ms !important;
      transition-timing-function: ease;
}

.p-store {
      background-image: linear-gradient(
            140deg,
            rgba(185, 192, 124, 0.603) 45%,
            rgba(110, 187, 116, 0.692) 65%
      );
}

.users-p:hover {
      box-shadow: 0px 0px 13px rgb(97, 141, 158);
      text-shadow: 1px 1px 4px black;
}

.users-p > button {
      position: absolute;
      top: 5px;
      left: 5px;
      color: whitesmoke;
      border: 0;
      background-color: inherit;
}

.users-p > button:hover {
      color: rgb(172, 53, 53);
}

.p-store > button:hover {
      color: royalblue;
}
</style>
