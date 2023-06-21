<template>
    <v-row justify="center">
        <v-form @submit.prevent="submitForm" class="w-50">
            <v-text-field v-model="name" label="Name" :rules="required"></v-text-field>
            <v-text-field v-model="email" label="Email" :rules="emailRules"></v-text-field>
            <v-textarea v-model="message" label="Message" :rules="required"></v-textarea>

            <v-btn type="submit" color="primary" class="float-right">Submit</v-btn>
        </v-form>
    </v-row>
</template>

<script>
    export default {
        computed : {
            required () {
                value => !!value || 'Kötelező megadni.';
            },
            emailRules() {
                return [
                    value => !!value || 'Kötelező megadni.',
                    value => {
                        if (!(/(.+)@(.+){2,}\.(.+){2,}/.test(value))) {
                            return 'Hibás email cím'
                        }
                        return true;
                    }
                ]
            }
        },
        data() {
            return {
                name: '',
                email: '',
                message: ''
            };
        },
        methods: {
            submitForm() {
                // @todo send the data to the server here.

                console.log('Name:', this.name);
                console.log('Email:', this.email);
                console.log('Message:', this.message);
            }
        }
    };
</script>