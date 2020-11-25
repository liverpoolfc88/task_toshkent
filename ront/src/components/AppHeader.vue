<template>
    <div class="home">
        <v-navigation-drawer absolute temporary v-model="drawer" class="hidden-md-and-up" style="margin-top: 56px">
            <v-list>
                <v-list-item v-for="(item,i) in menuItems" text :key="i" :to="item.route">
                    <v-list-item-icon>
                        <v-icon v-html="item.icon"></v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title v-text="item.title"></v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
<!--        <v-toolbar dark class="indigo darken-2">-->
        <v-toolbar dark class="red darken-4">
            <v-app-bar-nav-icon @click.stop="drawer=!drawer" class="hidden-md-and-up"></v-app-bar-nav-icon>
            <router-link to="/" tag="span" style="cursor:pointer">
            <v-toolbar-title v-text="'sardor88.88@mail.ru'"></v-toolbar-title>
            </router-link>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-md-and-down">
                <v-btn v-for="(item,i) in menuItems" text :key="i" :to="item.route">
                    <v-icon left v-html="item.icon"></v-icon>
                    {{ item.title }}
                </v-btn>
            </v-toolbar-items>

        </v-toolbar>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                drawer: false
            }
        },
        computed:{
            menuItems(){
                return [
                    {
                        icon: 'mdi-account-circle',
                        title: 'Profil',
                        route: '/profile'
                    },
                    {
                        icon: 'mdi-exit-to-app',
                        title: 'Chiqish',
                        route: '/logout'
                    },
                    {
                        icon: 'mdi-login',
                        title: 'Kirish',
                        route: '/signin'
                    },
                    {
                        icon: 'mdi-lock-open',
                        title: 'Ro\'yxatdan o\'tish',
                        route: '/signup'
                    }
                ]
            }
        }
    }
</script>
