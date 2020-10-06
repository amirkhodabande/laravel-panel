<template>
    <div>
        <!-- Deleting permissions -->
                <section class="panel">
                    <header class="panel-heading">حذف مجوز های کاربر</header>
                </section>
                <div class="users-containter">
                        <section v-for="per in userPermissions" :key="userPermissions.indexOf(per)"
                            class="users-p">
                            <button @click="removePermission(per.name, key)"><i class="icon-remove"></i></button>
                            <p>{{ per.name }}</p>
                        </section>
                </div>
        <!-- End -->
        <br><br><br><br>
        <!-- Adding permissions -->
                <section class="panel">
                    <header class="panel-heading">اضافه کردن مجوز به کاربر</header>
                </section>
                <div class="users-containter">

                        <section v-for="per in allPermissions" :key="allPermissions.indexOf(per)"
                            class="users-p p-store">
                            <button @click="addPermission(per, key)"><i class="icon-hand-up"></i></button>
                            <p>{{ per.name }}</p>
                        </section>

                </div>
        <!-- End -->
    </div>
</template>

<script>
import axios from "axios";
export default {
      props: ["all_permissions", "user_permissions"],
      data() {
            return {
                  allPermissions: JSON.parse(this.all_permissions),
                  userPermissions: JSON.parse(this.user_permissions),
            };
      },

      methods: {
            removePermission(name, key) {
                  //   axios.get(`/admin/permissions/${id}`);
                  axios.delete(`/admin/permissions/${name}`)
                        .then((resp) => {
                              window.noty({
                                    title: "تبریک",
                                    text:
                                          "شما با موفقیت یک دسترسی را حذف کردید.",
                                    icon: "error",
                                    button: "ادامه!",
                              });
                              location.reload();
                        })
                        .catch((error) => {
                              window.handleErrors(error);
                        });
            },
            addPermission(permission) {
                  axios.post(`/admin/permissions`, permission)
                        .then((resp) => {
                              window.noty({
                                    title: "تبریک",
                                    text:
                                          "شما با موفقیت یه دسترسی به کاربر اضافه کردین.",
                                    icon: "success",
                                    button: "ادامه!",
                              });
                              location.reload();
                        })
                        .catch((error) => {
                              window.handleErrors(error);
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
            rgb(161, 230, 255) 30%,
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
            rgb(161, 230, 255) 30%,
            rgba(235, 202, 104, 0.671) 65%
      );
}

.users-p:hover {
      box-shadow: 0px 0px 13px rgb(97, 141, 158);
      text-shadow: 1px 1px 4px black;
      background-image: linear-gradient(
            140deg,
            rgb(255, 191, 191) 30%,
            rgb(161, 230, 255) 65%
      );
}

.p-store:hover {
      background-image: linear-gradient(
            140deg,
            rgba(235, 202, 104, 0.671) 30%,
            rgb(161, 230, 255) 65%
      );
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
