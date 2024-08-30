   <!-- inner page section -->
   <section class="inner_page_head">
       <div class="container_fuild">
           <div class="row">
               <div class="col-md-12">
                   <div class="full">
                       <h3>My Profile</h3>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- end inner page section -->
   <section class="why_section layout_padding">
       <div class="container">
           <div class="row">
               <div class="col-lg-8 offset-lg-2">
                   <div class="full">
                       <?= $this->session->flashdata('message'); ?>
                       <form action="<?= base_url('member/proses_update/' . $user_info['id']); ?>" method="post">
                           <input type="hidden" name="id" value="<?= $user_info['id']; ?>">
                           <div class="form-group">
                               <label for="name">Name</label>
                               <input type="text" class="form-control" id="name" name="name" value="<?= $user_info['name']; ?>">
                           </div>
                           <div class="form-group">
                               <label for="email">Email</label>
                               <input type="email" class="form-control" id="email" name="email" value="<?= $user_info['email']; ?>">
                           </div>
                           <div class="modal-footer">
                               <button type="submit" class="btn btn-secondary">Save changes</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </section>