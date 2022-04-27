@extends('newtemplate')
@section('content')

<section id="contact" class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-wrapper form-style-two pt-115">
                    <h4 class="contact-title pb-10"><i class="lni lni-envelope"></i> Laissez nous <span> un message.</span></h4>
                    <form id="contact-form" action="assets/contact.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-input mt-25">
                                    <label>Nom</label>
                                    <div class="input-items default">
                                        <input name="name" type="text" placeholder="Nom" control-id="ControlID-1">
                                        <i class="lni lni-user"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-input mt-25">
                                    <label>Email</label>
                                    <div class="input-items default">
                                        <input type="email" name="email" placeholder="Email" control-id="ControlID-2">
                                        <i class="lni lni-envelope"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-input mt-25">
                                    <label>Message</label>
                                    <div class="input-items default">
                                        <textarea name="massage" placeholder="Message" control-id="ControlID-3"></textarea>
                                        <i class="lni lni-pencil-alt"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-input light-rounded-buttons mt-30">
                                    <button class="main-btn light-rounded-two" control-id="ControlID-4">Envoyer le message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
