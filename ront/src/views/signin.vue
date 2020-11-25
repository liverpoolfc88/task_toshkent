<template>
    <v-container
            class="fill-height"
            fluid
    >
        <v-row
                align="center"
                justify="center"
        >
            <v-col
                    cols="12"
                    sm="8"
                    md="4"
            >
                <v-card class="elevation-12">
                    <v-toolbar
                            color="red darken-4"
                            dark
                            flat
                    >
                        <v-toolbar-title>Kirish</v-toolbar-title>
                        <v-spacer></v-spacer>
                    </v-toolbar>
                    <v-card-text>
                        <v-form>

                            <v-text-field
                                    label="username"
                                    v-model="form.username"
                                    name="login"
                                    :error-messages="checkError('username')"
                                    prepend-icon="mdi-account"
                                    type="text"
                            ></v-text-field>

                            <v-text-field
                                    id="password"
                                    label="Password"
                                    v-model="form.password"
                                    name="password"
                                    :error-messages="checkError('password')"
                                    prepend-icon="mdi-lock"
                                    type="password"
                            ></v-text-field>

                        </v-form>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn dark color="red darken-4" @click="onRegister">Login</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>


<script>
    import axios from 'axios';

    export default {
        data(){
            return{
                form:{},
                errors:{}
            }
        },
        methods:{
            onRegister(){
                axios.post(this.$store.state.backend_url + 'site/loginapi', this.form)
                    .then(res=>{
                        if (res.data.success){
                            this.$router.push('/');
                            console.log('xaaaaa')
                        }
                        else {
                            console.log(this.errors);
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            },
            checkError(){
                // return this.errors.hasOwnProperty(field)?this.errors[field]:[];
                return 'error';
            }
        }
    }

</script>