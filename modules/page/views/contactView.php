<?php get_header(); ?>
<div class="contact container">
    <p class="text-contact">Hãy để lại thông tin liên lạc. <br> Chúng tôi sẽ liên hệ đến bạn sớm nhất có thể !</p>
    <img class="contact-img" style="    width: 700px;
    margin: 0px auto;" src="public/images/contact.png" alt="">
</div>
<style>
    .contact {
        width: 700px;
        margin: 0px auto;
    }

    img.contact-img {
        position: relative;
    }

    p.text-contact {
        display: inline-block;
        text-align: center;
        position: absolute;
        z-index: 999;
        left: 33%;
        font-family: cursive;
        font-size: 24px;
        color: #007264;
        margin-top: 20px;
        line-height: 1.6;
    }
</style>

<?php get_footer() ?>