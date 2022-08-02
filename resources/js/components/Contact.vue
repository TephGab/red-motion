<template>
    <div>
      <!-- ======= Contact Section ======= -->
    <section id="contact" ref="contact" class="contact mt-5">
      <div class="container" data-aos="fade-up" style="background: #0D0D0D; padding: 15px;">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Nous Contacter</p>
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Notre adresse</h3>
                  <p>Hainamosa, calle interior 5ta SANTO DOMINGO Este , RD</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Envoyez-nous un mail</h3>
                  <p>dorvilus@gmail.com<br>kenny@gmail.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Appelez-nous</h3>
                  <p>+1 849 607 7601<br>+509 4471 0749</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <form role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" required v-model="name">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" required v-model="email">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required v-model="subject">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required v-model="message"></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message a été envoyé. Merci!</div>
              </div>
              <div class="text-center" @click.prevent="sendMessage"><button type="submit">Envoyez message</button></div>
            </form>
          </div>
        </div>

      </div>
    </section>
    <!-- End Contact Section -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: '',
            email: '',
            subject: '',
            message: ''
        };
    },
    methods:{
      sendMessage(){
           const data = new FormData()
            data.append("name", this.name)
            data.append("email", this.email)
            data.append("subject", this.subject)
             data.append("message", this.message)
            
            axios.post('api/contact', data)
            .then((response) => {
                 this.$swal({
                text: 'Message envoyé!',
                toast: true,
                position: 'top-right',
                icon: 'success',
                color: '#000',
                padding: '0',
                showConfirmButton: false,
                timer: 2500
                });
                })
            .catch((error) => console.log(error));
      }
    },
    mounted() {
        console.log("Contact component mounted.");
    },
};
</script>