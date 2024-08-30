<!-- inner page section -->
<section class="inner_page_head">
    <div class="container_fuild">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <h3>Contact us</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end inner page section -->
<!-- Map Section with Table and Border -->
<section class="map_section">
    <div class="container">
        <table style="width:100%; border-collapse: collapse; border: 1px solid #000;">
            <tr>
                <td style="width:100%; padding:15px; text-align:center; border: 1px solid #000;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.1307923186791!2d106.75975786981492!3d-6.2292037605566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1f55c77145d%3A0x1e2ed99435c9cd21!2sTANRI%20ABENG%20UNIVERSITY!5e0!3m2!1sen!2sid!4v1722485716002!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </td>
            </tr>
        </table>
    </div>
</section>
<!-- why section -->
<section class="why_section layout_padding">
    <div class="container">
        <div class="row">
            <?php if ($user) : ?>
                <div class="col-lg-8 offset-lg-2">
                    <div class="full">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('member/contact'); ?>" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <input type="text" placeholder="Enter your full name" name="name" required />
                                <input type="email" placeholder="Enter your email address" name="email" required />
                                <input type="number" name="phone" placeholder="enter your number" required onkeypress="if(this.value.length == 10) return false;" />
                                <textarea name="message" placeholder="Enter your message" required></textarea>
                                <input type="submit" value="Submit" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            <?php else : ?>
                <h2>Please login if you want to message.</h2>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- end why section -->