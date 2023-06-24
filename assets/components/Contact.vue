<template>
    <v-container id="contact-page">
        <v-row justify="center">
            <v-col>
                <v-form @submit.prevent="submitForm" class="rounded" ref="contactForm" v-model="valid">
                    <v-text-field v-model="name" label="Name" :rules="[required]"></v-text-field>
                    <v-text-field v-model="email" label="Email" :rules="emailRules"></v-text-field>
                    <v-textarea v-model="message" label="Message" :rules="[required]"></v-textarea>

                    <v-btn type="submit" color="primary" class="float-right" :disabled="!isFormValid">Submit</v-btn>
                </v-form>
            </v-col>
        </v-row>


        <v-row v-if="showSuccess" class="success-message mt-10">
            <v-col class="text-center">
                Success
            </v-col>
        </v-row>
    </v-container>
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
                message: '',
                // name: 'Alma Andor',
                // email: 'alma.andor@alma.com',
                // message: 'Sziasztok! Tudnatok ajanlani egy jo bitkos konyvet ?'
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

                var post = {
                    'name':  this.name,
                    'email': this.email,
                    'message': this.message
                };

                console.log('/contact/save', post);

                this.$api.post(`/contact/save`, post).then((response) => {
                    console.log('Response', response);

                    this.showSuccess = true;
                });


            }
        }
    };
</script>