<template>
    <div id="contact-page">
        <v-row justify="center">
            <v-form @submit.prevent="submitForm" class="w-50 rounded-lg" ref="contactForm" v-model="valid">
                <v-text-field v-model="name" label="Name" :rules="[required]"></v-text-field>
                <v-text-field v-model="email" label="Email" :rules="emailRules"></v-text-field>
                <v-textarea v-model="message" label="Message" :rules="[required]"></v-textarea>

                <v-btn type="submit" color="primary" class="float-right" :disabled="!isFormValid">Submit</v-btn>
            </v-form>
        </v-row>

        <v-row v-if="showSuccess" class="success-message mt-15" justify="center">
            Success
        </v-row>
    </div>
</template>

<script>
    export default {
        computed : {
            required () {
                return value => !!value || 'Kötelező megadni.';
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
                valid: false,
                showSuccess: false,
                name: '',
                email: '',
                message: ''
            };
        },
        methods: {
            isFormValid() {
                return this.$refs.contactForm.validate();
            },
            submitForm() {
                if (!this.valid) {
                    return false;
                }

                // @todo
                // Data is valid, send it to the backend.
                console.log('Name:', this.name);
                console.log('Email:', this.email);
                console.log('Message:', this.message);

                this.showSuccess = true;
            }
        }
    };
</script>