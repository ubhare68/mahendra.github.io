<?php
  ts_contact_form();
?>
<form action="<?php the_permalink(); ?>" method="post" id="sky-form" class="sky-form">
  <header>Contacts <strong>form</strong></header>
  <fieldset>
    <div class="row">
      <section class="col col-6">
        <label class="label">Name</label>
        <label class="input"> <i class="icon-append icon-user"></i>
          <input type="text" name="name" id="name">
        </label>
      </section>
      <section class="col col-6">
        <label class="label">E-mail</label>
        <label class="input"> <i class="icon-append icon-envelope-alt"></i>
          <input type="email" name="email" id="email">
        </label>
      </section>
    </div>
    <section>
      <label class="label">Subject</label>
      <label class="input"> <i class="icon-append icon-tag"></i>
        <input type="text" name="subject" id="subject">
      </label>
    </section>
    <section>
      <label class="label">Message</label>
      <label class="textarea"> <i class="icon-append icon-comment"></i>
        <textarea rows="4" name="message" id="message"></textarea>
      </label>
    </section>
    <section>
      <label class="checkbox">
        <input type="checkbox" name="copy" id="copy">
        <i></i>Send a copy to my e-mail address</label>
    </section>
  </fieldset>
  <footer>
    <button type="submit" class="button">Send message</button>
  </footer>
  <div class="message"> <i class="icon-ok"></i>
    <p>Your message was successfully sent!</p>
  </div>
</form>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    // Validation
    $("#sky-form").validate(
    {         
      // Rules for form validation
      rules:
      {
        name:
        {
          required: true
        },
        email:
        {
          required: true,
          email: true
        },
        message:
        {
          required: true,
          minlength: 10
        }
      },
                
      // Messages for form validation
      messages:
      {
        name:
        {
          required: 'Please enter your name',
        },
        email:
        {
          required: 'Please enter your email address',
          email: 'Please enter a VALID email address'
        },
        message:
        {
          required: 'Please enter your message'
        }
      },
                
      // Ajax form submition          
      submitHandler: function(form)
      {
        $(form).ajaxSubmit(
        {
          success: function()
          {
            $("#sky-form").addClass('submited');
          }
        });
      },
      
      // Do not change code below
      errorPlacement: function(error, element)
      {
        error.insertAfter(element.parent());
      }
    });
  });
</script>